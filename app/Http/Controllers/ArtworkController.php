<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Artwork;
use App\Collection;
use App\Http\Resources\ArtworkResource;
use Illuminate\Http\Request;

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

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "id" => "nullable|integer",
            "name" => "required|min:3|max:255|string",
            "location" => "nullable|min:3|max:255|string",
            "description" => "nullable|min:5|max:1000|string",
            "value" => "nullable|integer|min:0",
            "published_at" => "nullable|before_or_equal:today",
            "purchased_at" => "required|before_or_equal:today",
            "collection_id" => "required|integer|exists:collections,id",
            "artist_id" => "required|integer|exists:artists,id",
            "file" => "nullable|image",
            "meas_x" => "nullable|int|min:0",
            "meas_y" => "nullable|int|min:0",
            "meas_z" => "nullable|int|min:0",
        ]);

        return Artwork::updateOrCreate($request->only('id'), $request->input());
    }
}
