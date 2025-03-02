<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LegendResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "strength" => $this->strength,
            "caption" => $this->caption,
            "habitat" => new HabitatResource($this->whenLoaded("habitat")),
            'image' => new ImageResource($this->whenLoaded('image'))
        ];
    }
}
