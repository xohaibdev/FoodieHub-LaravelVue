<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'name' => $this->name,
            'restaurant_name' => $this->restaurant->name,
            'restaurant_id' => $this->restaurant_id,
            'price' => $this->price,
            'created_at' => $this->created_at,
        ];
    }
}
