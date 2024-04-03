<?php

namespace App\Services;

use App\Contracts\SmsGatewayInterface;

class MySmsGateway implements SmsGatewayInterface
{
    public function sendSms(string $message, string $phone): void
    {
        // Send SMS using an external API or service
    }
}
