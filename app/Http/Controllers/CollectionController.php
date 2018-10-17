<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Resources\CollectionResource;
use Spatie\QueryBuilder\QueryBuilder;

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
}
