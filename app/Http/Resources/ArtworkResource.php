<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
            $this->mergeWhen(!empty($this->file), [
                "file" => Storage::url($this->file),
            ]),
            $this->mergeWhen(Auth::user(), [
                "location" => $this->location,
                "value" => $this->value,
                "purchased_at" => $this->purchased_at,
            ]),
        ];
    }
}