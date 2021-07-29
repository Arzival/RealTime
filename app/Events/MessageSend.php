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

// se implementa el ShouldBroadcast
class MessageSend implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    // declaramos las variables que sean necesarias
    public $user;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    //las pasamos como parametro en constructor, solo si se necesitan
    public function __construct(User $user, $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    //retornamos nuestra notificacion de manera publica
    public function broadcastOn()
    {
        \Log::debug("{$this->user->name}: {$this->message}");
        return new PresenceChannel('chat');
    }
}
