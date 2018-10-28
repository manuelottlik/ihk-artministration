<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $fillable = ['name', 'location', 'description', 'collection_id', 'artist_id', 'value', 'published_at', 'purchased_at', 'meas_x', 'meas_y', 'meas_z'];
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
