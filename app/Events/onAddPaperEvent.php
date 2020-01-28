<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\User;
use App\Models\Paper;
use App\Models\Notification;

class onAddPaperEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $paper_id;
    public $notification_id;
    public $contestant_id;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Paper $paper)
    {
        $this->user_id = $user->id;
        $this->paper_id = $paper->id;

        $this->contestant_id = $paper->contestant_id;

        // $this->notification_id = $notification->id;
        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

