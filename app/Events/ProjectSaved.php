<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectSaved{

    public $PROPERTY;

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct($videojuego){
        $this->videojuego = $videojuego;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
