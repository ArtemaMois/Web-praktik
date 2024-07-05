<?php


namespace App\Facades\Grade;
use Illuminate\Support\Facades\Facade;

class GradeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'grade';
    }

}
