<?php

namespace App\Listeners;

use App\Events\onAddPaperEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;

use App\User;
use App\Models\Paper;
use App\Models\Notification;
use App\Models\Expert;
use App\Models\Examination;
use App\Models\Status;

class AddPaperListener
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
     * @param  onAddPaperEvent  $event
     * @return void
     */
    public function handle(onAddPaperEvent $event)
    {
        $paper_name = Paper::where('id', $event->paper_id)->first()->paper_name;
        $paper_name = Str::limit($paper_name, 30);

        $notification = new Notification;
        $notification->paper_id = $event->paper_id;
        $notification->contestant_id = $event->contestant_id;
        // $notification->expert_id = $expert_id;
        $notification->expert_id = null;
        $notification->notfn_content = 'Ваша работа ' . '"' . $paper_name . '"' . ' была опубликована';
        $resoult = $notification->save();

        /*$status = new Status;
        $status->status_name = 'not';
        $resoult = $status->save();*/

        $experts = Expert::all();
        if($experts != null) {
	        $expertsIdArr = [];

	        foreach ($experts as $expert) {
	            $expertsIdArr[] = $expert->id;
	        }

	        $expertId = 0;
	        if(count($expertsIdArr) > 0) {
	            $expertId = $expertsIdArr[random_int(0, count($expertsIdArr) - 1)];
	        }

	        $status = new Status;
	        $status->status_name = 'not';
	        $resoult = $status->save();

	        $examination = new Examination;
	        $examination->expert_id = $expertId;
	        $examination->paper_id = $event->paper_id;
	        $examination->status_id = $status->id;
	        $resoult = $examination->save();
    	}
        // dd($examination);

    }
}

