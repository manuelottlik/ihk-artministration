<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtworkResource extends JsonResource
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
            "collection" => new CollectionResource($this->whenLoaded('collection')),
            "artist" => new ArtistResource($this->whenLoaded('artist')),
            "published_at" => $this->published_at,
            "file" => $this->file,
        ];
    }
}
