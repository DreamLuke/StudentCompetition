<?php

namespace App\Listeners;

use App\Events\onAddPopularEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use App\User;

use App\Models\Paper;
use App\Models\Notification;
use App\Models\Vote;

class AddPopularListener
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
     * @param  onAddPopularEvent  $event
     * @return void
     */
    public function handle(onAddPopularEvent $event)
    {
        // Для старых значений votes
        $paper_id_arr = [];

        foreach ($event->votes as $vote) {
            $paper_id_arr[] = $vote->paper_id;
        }
        rsort($paper_id_arr);
        
        $old_paper_id_count_arr = [];
        for($i = 0; $i < count($paper_id_arr); $i++) {
            $index = $paper_id_arr[$i];

            if($i == 0) {
                $count = 1;
                $old_paper_id_count_arr[$index] = $count;
            } else {
                if($index == $paper_id_arr[$i - 1]) {
                    //dd($i);

                    $count += 1;
                    $old_paper_id_count_arr[$index] = $count;

                    // dd($paper_id_count_arr);
                } else {
                    if(count($old_paper_id_count_arr) == 12) {
                        break;
                    }

                    $count = 1;
                    $old_paper_id_count_arr[$index] = $count;
                }
            }
        }

        
        // Для значений votes после нового голоса
        $votes = Vote::all();
        $paper_id_arr = [];

        foreach ($votes as $vote) {
            $paper_id_arr[] = $vote->paper_id;
        }
        rsort($paper_id_arr);
        // dd($paper_id_arr);

        for($i = 0; $i < count($paper_id_arr); $i++) {
            $index = $paper_id_arr[$i];

            if($i == 0) {
                $count = 1;
                $paper_id_count_arr[$index] = $count;
            } else {
                if($index == $paper_id_arr[$i - 1]) {
                    //dd($i);

                    $count += 1;
                    $paper_id_count_arr[$index] = $count;

                    // dd($paper_id_count_arr);
                } else {
                    if(count($paper_id_count_arr) == 12) {
                        break;
                    }

                    $count = 1;
                    $paper_id_count_arr[$index] = $count;
                }
            }
        }

        $paper_id_changed = -1;

        $old_keys = array_keys($old_paper_id_count_arr);
        $keys = array_keys($paper_id_count_arr);

        rsort($old_keys);
        rsort($keys);
        
        $count = count($keys);
        for($i = 0; $i < $count; $i++) {
            $old_value = array_pop($old_keys);
            $value = array_pop($keys);

            if($old_value != $value) {
                $paper_id_changed = $value;
            } 
        }

        $value = array_pop($keys);
        if($paper_id_changed == -1 && $value != null) {
            //dd($value);
            $paper_id_changed = $value;
        }

        if($paper_id_changed != -1) {
            $paper_name = Paper::where('id', $paper_id_changed)->first()->paper_name;
            $contestant_id = Paper::where('id', $paper_id_changed)->first()->contestant_id;

            $notification = new Notification;

            $notification->paper_id = $event->paper_id;

            $notification->contestant_id = $contestant_id;
            $notification->expert_id = null;
            $notification->notfn_content = 'Ваша работа ' . '"' . $paper_name . '"' . ' попала в список популярных';

            $resoult = $notification->save();
        }
    }
}
