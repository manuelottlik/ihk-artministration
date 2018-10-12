<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    public function collection()
    {
        return $this->belongsTo('App\Collection');
    }

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
}
