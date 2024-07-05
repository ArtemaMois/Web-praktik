<?php

namespace App\Http\Controllers\Api\v1\Team;

use App\Events\Team\DeletedTeamEvent;
use App\Events\Team\TeamCreatedEvent;
use App\Facades\Team\TeamFacade;
use App\Http\Controllers\Api\v1\Mail\MailController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\ResendMailRequest;
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
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class TeamController extends Controller
{
    public function index()
    {
        return response()->json(['status' => 'success',
            'data' => MinifiedTeamResource::collection(Team::all())
        ]);
    }

    public function show(Team $team)
    {
        return response()->json([
            'status' => 'success',
            'data' => new MinifiedTeamResource($team)]);
    }

    public function store(StoreTeamRequest $request)
    {
        $imagePath = $request->file('image')->store('/teams');
        $team = TeamFacade::createTeam($request->validated(), $imagePath);
        event(new TeamCreatedEvent($team, $request->users));
        return response()->json(['status' => 'success',
            'data' => MinifiedTeamResource::make($team),
        ]);
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update([
            'login' => $request->login
        ]);
        if($request->hasFile('image'))
        {
            Storage::delete($team->image);
            $team->update(['image' => $request->file('image')->store('/teams')]);
        }

        return response()->json(['status' => 'success', 'data' => MinifiedTeamResource::make($team)]);
    }

    public function delete(Team $team)
    {
        event(new DeletedTeamEvent($team));
        $team->delete();

        return response()->json(['status' => 'success']);
    }

    public function verifyEmail(VerifyEmailRequest $request, Team $team)
    {
        $team = Team::query()->where('email', $request->email)->first();

        return TeamFacade::verifyTeamEmail($team, $request->code) ?
            response()->json(['status' => 'success']) :
            response()->json(['status' => 'failed',
                'message' => "Incorrect verification code"]);
    }

    public function resendVerifyEmail(ResendMailRequest $request)
    {
        $team = Team::query()->where('email', $request->email)->first();
        $team->emailVerificationCodes()->delete();
        MailController::sendVerificationMail($team);
        return response()->json([
            'status' => 'success',
            'message' => 'Письмо отправлено на почту'
        ]);
    }

}
