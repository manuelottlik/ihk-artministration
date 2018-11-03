<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::resource('collections', 'CollectionController')->only([
    "index", "show",
]);

Route::resource('artists', 'ArtistController')->only([
    "index", "show",
]);

Route::resource('artworks', 'ArtworkController')->only([
    "index", "show",
]);

Route::middleware('auth')->group(function () {
    Route::resource('collections', 'CollectionController')->only([
        "store",
    ]);

    Route::resource('artists', 'ArtistController')->only([
        "store",
    ]);

    Route::resource('artworks', 'ArtworkController')->only([
        "store",
    ]);
});
