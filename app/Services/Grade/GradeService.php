<?php


namespace App\Services\Grade;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;

class GradeService
{
    public function store($data, $team): bool|Model
    {
        $existsGrade = Grade::query()
            ->where('evaluator_id', auth()->user()->id)
            ->where('team_id', $team->id)
            ->firstOr(function () {
                return false;
            });
        if (!$existsGrade && auth()->user()->id != $team->id) {
            $grade = Grade::query()->create([
                'evaluator_id' => auth()->user()->id,
                'team_id' => $team->id,
                'design' => $data['design'],
                'usability' => $data['usability'],
                'layout' => $data['layout'],
                'implementation' => $data['implementation']
            ]);

            return $grade;
        }
        return false;
    }
}
