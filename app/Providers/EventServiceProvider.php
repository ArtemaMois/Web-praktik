<?php

namespace App\Providers;

use App\Events\Team\DeletedTeamEvent;
use App\Events\Team\TeamCreatedEvent;
use App\Listeners\DeleteTeamImagesListener;
use App\Listeners\Team\CreateUsersListener;
use App\Listeners\Team\SendEmailsListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TeamCreatedEvent::class => [
            CreateUsersListener::class,
            SendEmailsListener::class,
        ],
        DeletedTeamEvent::class => [
            DeleteTeamImagesListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
