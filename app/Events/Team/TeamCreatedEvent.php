<?php

namespace App\Events\Team;

use App\Models\Team;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TeamCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Team $team;
    public array $users;
    public function __construct($team, $users)
    {
        $this->team = $team;
        $this->users = $users;
    }

}
