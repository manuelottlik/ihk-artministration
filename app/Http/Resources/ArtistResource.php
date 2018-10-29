<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "born_at" => $this->born_at,
            "died_at" => $this->died_at,
            "artworks" => ArtworkResource::collection($this->whenLoaded('artworks')),
        ];
    }
}
