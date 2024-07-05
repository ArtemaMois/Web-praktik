<?php

namespace App\Facades\Mail;

use App\Services\Mail\MailService;
use Illuminate\Support\Facades\Facade;

class MailFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mail';
    }
}