<?php

namespace App\Http\Controllers\Api\v1\Team;

use App\Events\Team\TeamCreatedEvent;
use App\Facade\Team\TeamFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\VerifyEmailRequest;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Http\Resources\Team\MinifiedTeamResource;
use App\Http\Resources\User\MinifiedUserResource;
use App\Models\EmailVerificationCode;
use App\Models\Team;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use function PHPUnit\Framework\isNull;

class TeamController extends Controller
{
    public function index()
    {
        return response()->json(['status' => 'success',
            'data' => MinifiedTeamResource::collection(Team::all())
        ]);
    }

    public function store(StoreTeamRequest $request)
    {
        $team = TeamFacade::createTeam($request->validated());
        event(new TeamCreatedEvent($team, $request->input(['users'])));
        return response()->json(['status' => 'success',
            'data' => MinifiedTeamResource::make($team),
        ]);
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update($request->validated());
        return response()->json(['status' => 'success', 'data' => MinifiedTeamResource::make($team)]);
    }

    public function delete(Team $team)
    {
        $team->delete();
        return response()->json(['status' => 'success']);
    }

    public function verifyEmail(VerifyEmailRequest $request, Team $team)
    {
        return TeamFacade::verifyTeamEmail($team, $request->code) ?
            response()->json(['status' => 'success']) :
            response()->json(['status' => 'failed',
                'message' => "Incorrect verification code"]);
    }


}
