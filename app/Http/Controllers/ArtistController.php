<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Http\Resources\ArtistResource;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArtistResource::collection(
            QueryBuilder::for(Artist::class)
                ->allowedIncludes('artworks')
                ->allowedFilters('name', 'born_at', 'died_at')
                ->get()
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        return new ArtistResource(
            QueryBuilder::for(Artist::where('id', $artist->id))
                ->allowedIncludes('artworks')
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
            "name" => "required|min:3|max:255",
            "born_at" => "required|before_or_equal:today",
            "died_at" => "required|before_or_equal:today",
        ]);

        return Artist::updateOrCreate($request->only('id'), $request->input());
    }
}
