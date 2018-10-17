<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ["name"];

    public function artworks()
    {
        return $this->hasMany('App\Artwork');
    }

    public function artists()
    {
        return $this->hasManyThrough('App\Artist', 'App\Artwork');
    }
}
