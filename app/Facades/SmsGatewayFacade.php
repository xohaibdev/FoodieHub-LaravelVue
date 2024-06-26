<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SmsGatewayFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sms-gateway';
    }
}
