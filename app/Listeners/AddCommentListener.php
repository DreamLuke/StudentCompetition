<?php

namespace App\Listeners;

use App\Events\onAddCommentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;

use App\User;
use App\Models\Paper;
use App\Models\Notification;
use App\Models\Expert;

class AddCommentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  onAddCommentEvent  $event
     * @return void
     */
    public function handle(onAddCommentEvent $event)
    {
        $paper_name = Paper::where('id', $event->paper_id)->first()->paper_name;
        $paper_name = Str::limit($paper_name, 30);
        $contestant_id = Paper::where('id', $event->paper_id)->first()->contestant_id;

        // $expert_id = new Expert::where('id', '>', '0')->first()->id;
        $expert = new Expert;
        $expert_id = $expert->where('user_id', $event->user_id)->first()->id;

        $notification = new Notification;

        $notification->paper_id = $event->paper_id;

        $notification->contestant_id = $contestant_id;
        $notification->expert_id = $expert_id;
        $notification->notfn_content = 'Ваша работа ' . '"' . $paper_name . '"' . ' получила общий комментарий';

        $resoult = $notification->save();
    }
}
