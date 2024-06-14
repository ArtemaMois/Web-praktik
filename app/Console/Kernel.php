<?php

namespace App\Console;

use App\Models\EmailVerificationCode;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;

class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function() {
            EmailVerificationCode::query()->
            where('expired_at', '<', Carbon::now())->delete();
        })->hourly();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
