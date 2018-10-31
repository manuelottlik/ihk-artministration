<?php

namespace App\Http\Controllers\Frontend;

use App\Artist;
use App\Artwork;
use App\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artworks-index', ['artworks' => Artwork::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artworks-edit', [
            'artwork' => new Artwork(),
            'collections' => Collection::all(),
            'artists' => Artist::all(),
        ]);
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

        $artwork = Artwork::updateOrCreate($request->only('id'), $request->input());
        $artwork->file = $request->file('file')->store('artworks', 'public');
        $artwork->save();

        return redirect(route('artworks.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function edit(Artwork $artwork)
    {
        return view('artworks-edit', [
            'artwork' => $artwork,
            'collections' => Collection::all(),
            'artists' => Artist::all(),
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artwork $artwork)
    {
        $artwork->delete();

        return redirect(route('artworks.index'));
    }
}
