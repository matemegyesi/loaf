<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MythResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'habitat' => new HabitatResource($this->whenLoaded('habitat')),
            'size' => new SizeResource($this->whenLoaded('size')),
            'elements' => ElementResource::collection($this->whenLoaded("elements")),
            'image' => new ImageResource($this->whenLoaded('image'))
        ];
    }
}
