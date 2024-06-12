<?php

namespace App\Services\Mail;

use App\Models\EmailVerificationCode;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PHPMailer\PHPMailer\PHPMailer;

class MailService
{
    public function getWelcomeMailBody(Team $team): string
    {
        return $this->getMailBody('email.welcome', [
            'team' => $team,
            'users' => $team->users
        ]);
    }

    public function getVerificationMailBody(Team $team): string
    {
        $created_at = Carbon::now();
        $code = EmailVerificationCode::query()->create([
            'team_id' => $team->id,
            'code' => rand(100000, 999999),
            'created_at' => $created_at,
            'expired_at' => $created_at->addHour()
        ]);
        return $this->getMailBody('email.verification',
            [
                'team' => $team,
                'code' => $code->code
            ]);
    }

    public function sendMail(string $email, string $subject, string $body): bool
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = env('MAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        $mail->Port = 465;
        $mail->CharSet = "UTF-8";
        $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        return $mail->send();
    }

    public function getMailBody(string $view, $default = []): string
    {
        return isset($default) ? view($view, $default)->render() : view($view)->render();
    }
}
