<?php

namespace App\Listeners\Team;

use App\Events\Team\TeamCreatedEvent;
use App\Http\Controllers\Api\v1\Mail\MailController;
use App\Jobs\Team\SendVerificationMailJob;
use App\Jobs\Team\SendWelcomeMailJob;
use App\Models\EmailVerificationCode;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailsListener
{

    public function __construct()
    {
        //
    }

    public function handle(TeamCreatedEvent $event): void
    {
        SendWelcomeMailJob::dispatch($event->team);
        SendVerificationMailJob::dispatch($event->team);
    }
}
