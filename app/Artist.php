<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ["name", "born_at"];
    protected $dates = ['born_at', 'died_at', 'createed_at', 'updated_at'];
    public function artworks()
    {
        return $this->hasMany('App\Artwork');
    }

}
