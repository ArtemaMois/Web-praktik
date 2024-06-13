<?php

namespace App\Jobs\Team;

use App\Http\Controllers\Api\v1\Mail\MailController;
use App\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public function __construct(
        private Team $team,
    )
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        MailController::sendWelcomeMail($this->team);
    }
}
