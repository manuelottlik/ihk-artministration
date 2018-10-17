<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $fillable = ['name', 'value', 'published_at', 'purchased_at', 'collection_id', 'artist_id'];
    protected $dates = ['published_at', 'purchased_at', 'created_at', 'updated_at'];
    public function collection()
    {
        return $this->belongsTo('App\Collection');
    }

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
}
