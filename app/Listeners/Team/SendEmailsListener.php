<?php

namespace App\Listeners\Team;

use App\Events\Team\TeamCreatedEvent;
use App\Http\Controllers\Api\v1\Mail\MailController;
use App\Models\EmailVerificationCode;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailsListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TeamCreatedEvent $event): void
    {
        MailController::sendWelcomeMail($event->team);
        MailController::sendVerificationMail($event->team);

//        $created_at = Carbon::now();
//        $expired_at = Carbon::now()->addHour();
//        EmailVerificationCode::query()->create([
//            'team_id' => $event->team->id,
//           'code' => rand(100000, 999999),
//           'created_at' => $created_at,
//            'expired_at' => $expired_at,
//        ]);
    }
}
