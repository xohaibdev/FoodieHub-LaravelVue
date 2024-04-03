<?php

namespace App\Listeners;

use App\Events\RestaurantUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class SendRestaurantUpdateNotification
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
    public function handle(RestaurantUpdated $event): void
    {
        $restaurant = $event->restaurant;

        Http::post($restaurant->webhook_endpoint, [
            'message' => 'Restaurant updated!',
            'info' => [
                'id' => $restaurant->id,
                'name' => $restaurant->name,
            ],
        ]);
    }
}
