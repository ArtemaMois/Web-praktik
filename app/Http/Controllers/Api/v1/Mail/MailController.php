<?php

namespace App\Http\Controllers\Api\v1\Mail;

use App\Facades\Mail\MailFacade;
use App\Http\Controllers\Controller;
use App\Models\EmailVerificationCode;
use App\Models\Grade;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MailController extends Controller
{
    static function sendWelcomeMail(Team $team): bool
    {
        $body = MailFacade::getWelcomeMailBody($team);

        return self::sendMail($team->email, "Welcome letter", $body);
    }

    static function sendVerificationMail(Team $team): bool
    {
        $body = MailFacade::getVerificationMailBody($team);

        return self::sendMail($team->email, 'Email verification', $body);
    }

    static function sendEvaluationMail(Grade $grade, Team $evaluatedTeam)
    {
        $body = MailFacade::getEvaluationMailBody($grade);

        return self::sendMail($evaluatedTeam->email, "Оценка команды", $body);
    }

    private static function sendMail($email, $subject, $body)
    {
        return MailFacade::sendMail($email, $subject, $body);
    }

}
