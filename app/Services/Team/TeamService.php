<?php

namespace App\Services\Team;

use App\Events\Team\TeamCreatedEvent;
use App\Models\Team;
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

        return $team;
    }
}
