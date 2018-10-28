<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CollectionResource extends JsonResource
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
            "id" => bcrypt($this->id),
            "name" => $this->name,
            "artworks" => ArtworkResource::collection($this->whenLoaded('artworks')),
        ];
    }
}
