<?php

namespace App\Services\Team;

use App\Events\Team\TeamCreatedEvent;
use App\Models\EmailVerificationCode;
use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class TeamService
{
    public function createTeam(array $data): Model
    {
        $team = Team::query()->create([
           'login' => $data['login'],
           'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return $team;
    }

    public function verifyTeamEmail(Team $team, int $code): bool
    {
        $code = EmailVerificationCode::query()->where('team_id', $team->id)
            ->where('code', $code)
            ->where('expired_at', '>', Carbon::now())
            ->orderBy('id', 'desc')
            ->first();

        if (!isset($code)) {
            return false;
        }
        $team->update(['email_verified_at' => Carbon::now()]);
        return true;
    }
}
