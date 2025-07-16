<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusStops extends Model
{
    protected $fillable = ['route_id', 'name'];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
