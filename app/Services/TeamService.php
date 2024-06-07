<?php

namespace App\Services;

use App\Http\Requests\Team\StoreTeamRequest;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class TeamService
{
    public function createUsers(StoreTeamRequest $request, Model $team)
    {
        $users = $request->input('users');
        foreach ($users as $user){
            User::query()->create([
                'name' => $user['name'],
                'command_id' => $team->id,
                'description' => $request->input('description'),
            ]);
        }
    }

    public function createTeam(array $data)
    {
        $team = Team::query()->create([
           'name' => $data['name'],
           'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);




    }
}
