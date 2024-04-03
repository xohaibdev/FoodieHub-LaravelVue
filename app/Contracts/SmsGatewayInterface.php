<?php

namespace App\Contracts;

interface SmsGatewayInterface
{
    public function sendSms(string $message, string $phone): void;
}
