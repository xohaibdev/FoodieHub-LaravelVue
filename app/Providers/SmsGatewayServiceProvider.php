<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\SmsGatewayInterface;
use App\Services\MySmsGateway;

class SmsGatewayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind('sms-gateway', function ($app) {
            return new MySmsGateway();
        });
    }
}
