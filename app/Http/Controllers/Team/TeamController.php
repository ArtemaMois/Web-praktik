<?php

namespace App\Http\Controllers\Team;

use App\Facade\TeamFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Http\Resources\Team\MinifiedTeamResource;
use App\Http\Resources\User\MinifiedUserResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        dd($request);
    }

    public function store(StoreTeamRequest $request)
    {
        $team = TeamFacade::createTeam($request->validated());
        return response()->json(['status' => 'success',
            'data' => [
                'team' => MinifiedTeamResource::make($team),
                'users' => MinifiedUserResource::collection($team->users)
            ]]);
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {

    }

    public function delete(Team $team)
    {
    }
}
