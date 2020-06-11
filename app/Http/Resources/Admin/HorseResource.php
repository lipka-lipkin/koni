<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class HorseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'breed' => $this->breed,
            'color' => $this->color,
            'age' => $this->age,
            'win_rate' => $this->win_rate,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'riders' => RiderResource::collection($this->whenLoaded('riders')),
            'owner' => OwnerResource::make($this->whenLoaded('owner'))
        ];
    }
}
