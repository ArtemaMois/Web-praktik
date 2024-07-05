<?php

namespace App\Providers;

use App\Services\Grade\GradeService;
use App\Services\Mail\MailService;
use App\Services\Team\TeamService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('team', TeamService::class);
        $this->app->bind('mail', MailService::class);
        $this->app->bind('grade', GradeService::class);
    }

    public function boot(): void
    {
        //
    }
}
