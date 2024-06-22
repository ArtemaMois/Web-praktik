<?php

namespace App\Http\Controllers\Api\v1\Mail;

use App\Facade\Mail\MailFacade;
use App\Http\Controllers\Controller;
use App\Models\EmailVerificationCode;
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

    private static function sendMail($email, $subject, $body)
    {
        return MailFacade::sendMail($email, $subject, $body);
    }

}
