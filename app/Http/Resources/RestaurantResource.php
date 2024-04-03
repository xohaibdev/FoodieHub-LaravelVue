<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'hashed_id' => $this->hashed_id,
            'name'      => $this->name,
            'address' => $this->address,
            'email' => $this->email,
            'webhook_endpoint' => $this->webhook_endpoint,
        ];
    }
}
