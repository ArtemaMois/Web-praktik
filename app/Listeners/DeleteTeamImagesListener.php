<?php

namespace App\Listeners;

use App\Events\Team\DeletedTeamEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class DeleteTeamImagesListener
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
    public function handle(DeletedTeamEvent $event): void
    {
        Storage::delete($event->team->image);
        foreach($event->team->users as $user){
            Storage::delete($user->image);
        }
    }
}
