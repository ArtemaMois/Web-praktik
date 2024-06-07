<?php

namespace App\Http\Controllers\Team;

use App\Facade\TeamFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Team\StoreTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
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
        TeamFacade::createTeam($request->validated());
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {

    }

    public function delete(Team $team)
    {
    }
}
