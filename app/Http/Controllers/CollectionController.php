<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Resources\CollectionResource;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;


class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CollectionResource::collection(
            QueryBuilder::for(Collection::class)
                ->allowedIncludes('artworks')
                ->allowedFilters('name')
                ->get()
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return new CollectionResource(
            QueryBuilder::for(Collection::where('id', $collection->id))
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
        ]);

        return Collection::updateOrCreate($request->only('id'), $request->input());
    }
}
