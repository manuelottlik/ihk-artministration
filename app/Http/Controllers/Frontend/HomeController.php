<?php

namespace App\Http\Controllers\Frontend;

use App\Artwork;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
/**
 * Show the presentation.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        return view('home', ['artworks' => Artwork::all()]);
    }

/**
 * Show the application dashboard.
 *
 * @return \Illuminate\Http\Response
 */
    public function dashboard()
    {
        return view('dashboard');
    }
}
