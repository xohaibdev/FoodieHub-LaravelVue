<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddonResource extends JsonResource
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

            // 'item' => new ItemResource($this->whenLoaded('item')),

            'item_name' => $this->item->name,
            'item_id' => $this->item->id,

            'restaurant_name' => optional($this->item)->restaurant->name,
            'restaurant_id' => optional($this->item)->restaurant->id,

            'created_at' => $this->created_at,

        ];
    }
}
