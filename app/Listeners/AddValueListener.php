<?php

namespace App\Listeners;

use App\Events\onAddValueEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\Models\Paper;
use App\Models\Notification;
use App\Models\Expert;
use App\Models\Examination;
use App\Models\Status;

class AddValueListener
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
     * @param  onAddValueEvent  $event
     * @return void
     */
    public function handle(onAddValueEvent $event)
    {
        $paper_name = Paper::where('id', $event->paper_id)->first()->paper_name;
        $contestant_id = Paper::where('id', $event->paper_id)->first()->contestant_id;

        // $expert_id = new Expert::where('id', '>', '0')->first()->id;
        $expert = new Expert;
        $expert_id = $expert->where('user_id', $event->user_id)->first()->id;

        $notification = new Notification;

        $notification->paper_id = $event->paper_id;

        $notification->contestant_id = $contestant_id;
        $notification->expert_id = $expert_id;
        $notification->notfn_content = 'Ваша работа ' . '"' . $paper_name . '"' . ' получила оценку эксперта';
        $resoult = $notification->save();

        $examination = Examination::where('paper_id', $event->paper_id)->first();
        $status = Status::where('id', $examination->paper_id)->first();
        $status->status_name = 'yes';
        $resoult = $status->save();

    }
}
