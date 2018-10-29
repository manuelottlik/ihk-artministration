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
            "description" => $this->description,
            "collection" => new CollectionResource($this->whenLoaded('collection')),
            "artist" => new ArtistResource($this->whenLoaded('artist')),
            "published_at" => $this->published_at,
            "measurements" => [
                "x" => $this->meas_x,
                "y" => $this->meas_y,
                "z" => $this->meas_z,
            ],
            "file" => $this->file,
        ];
    }
}
