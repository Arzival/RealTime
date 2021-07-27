<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

// se implementa el ShouldBroadcast y se eleminia el SerializesModels
class UserDeleted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets;
    // declaramos las variables que sean necesarias
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    //las pasamos como parametro en constructor, solo si se necesitan
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    //retornamos nuestra notificacion de manera publica
    public function broadcastOn()
    {
        return new Channel('users');
    }
}
