<?php

namespace App\Http\Controllers;

use App\Events\Team\TeamEvaluatedEvent;
use App\Facades\Grade\GradeFacade;
use App\Http\Requests\Grade\StoreGradeRequest;
use App\Models\Grade;
use App\Models\Team;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    public function store(StoreGradeRequest $request, Team $team)
    {
        $grade = GradeFacade::store($request->validated(), $team);

        if(!$grade){
            return response()->json([
                'status' => 'failed',
                'message' => "Ваша команда не может поставить оценку команде $team->login"
            ]);
        }
        event(new TeamEvaluatedEvent($grade, $team));
        return response()->json([
            'status' => 'success',
            'data' => $grade
        ]);

    }
}
