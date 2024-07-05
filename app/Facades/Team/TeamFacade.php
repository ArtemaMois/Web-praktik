<?php

namespace App\Facades\Team;

use Illuminate\Support\Facades\Facade;

class TeamFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'team';
    }
}
