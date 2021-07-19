<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

// se implementa el ShouldBroadcast
class UserSessionChange implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    // declaramos las variables que sean necesarias
    public $message;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    //las pasamos como parametro en constructor, solo si se necesitan
    public function __construct($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    //retornamos nuestra notificacion de manera publica
    public function broadcastOn()
    {
        return new Channel('notifications');
    }
}
