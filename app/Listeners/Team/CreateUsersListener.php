<?php

namespace App\Listeners\Team;

use App\Events\Team\TeamCreatedEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUsersListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TeamCreatedEvent $event): void
    {
        foreach ($event->users as $key => $user){
            User::query()->create([
                'team_id' => $event->team->id,
                'name' => $user['name'],
                'description' => $user['description']
            ]);
        }
    }
}
