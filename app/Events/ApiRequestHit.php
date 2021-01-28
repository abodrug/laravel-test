<?php

namespace App\Events;

use App\Models\User;
use App\Traits\Stats;
use Auth;
use Cache;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApiRequestHit
{
    use Dispatchable, InteractsWithSockets, SerializesModels, Stats;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('api-request-hit');
    }

    public function actionApi(User $user, $time): void
    {
        $value = (int) $this->getStats($user->id);
        $this->setStats($user->id, $value + 1);
    }
}
