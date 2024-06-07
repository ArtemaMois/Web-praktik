<?php

namespace App\Facade;

use App\Services\TeamService;
use Illuminate\Support\Facades\Facade;

class TeamFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'team';
    }
}
