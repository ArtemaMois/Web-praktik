<?php

namespace App\Listeners\Team;

use App\Events\Team\TeamEvaluatedEvent;
use App\Http\Controllers\Api\v1\Mail\MailController;
use App\Jobs\Team\SendEvaluationMailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMailWithGradesListener
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
    public function handle(TeamEvaluatedEvent $event): void
    {
        SendEvaluationMailJob::dispatch($event->grade, $event->evaluatedTeam);
    }
}
