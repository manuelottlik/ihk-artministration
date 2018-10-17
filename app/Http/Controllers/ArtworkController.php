<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Artwork;
use App\Collection;
use App\Http\Resources\ArtworkResource;
use Spatie\QueryBuilder\QueryBuilder;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArtworkResource::collection(
            QueryBuilder::for(Artwork::class)
                ->allowedIncludes('collection', 'artist')
                ->allowedFilters('name', 'collection_id', 'artist_id', 'published_at')
                ->get()
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artwork  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artwork $artwork)
    {
        return new ArtworkResource(
            QueryBuilder::for(Artwork::where('id', $artwork->id))
                ->allowedIncludes('collection', 'artist')
                ->first()
            );
    }
}
