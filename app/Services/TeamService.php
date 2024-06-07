<?php

namespace App\Services;

use App\Events\Team\TeamCreatedEvent;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class TeamService
{
    public function createTeam(array $data): Model
    {
        $team = Team::query()->create([
           'name' => $data['name'],
           'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        event(new TeamCreatedEvent($team, $data['users']));

        return $team;
    }
}
