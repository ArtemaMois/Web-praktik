<?php

namespace App\Jobs\Team;

use App\Http\Controllers\Api\v1\Mail\MailController;
use App\Models\Grade;
use App\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEvaluationMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private Grade $grade,
        private Team $evaluatedTeam,
    )
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        MailController::sendEvaluationMail($this->grade, $this->evaluatedTeam);
    }
}
