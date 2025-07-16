<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['user_id','routeName', 'Start_area', 'Start_district', 'destination_district', 'destination_area'];
    /** @use HasFactory<\Database\Factories\RouteFactory> */
    use HasFactory;

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
     public function busStops()
    {
        return $this->hasMany(busStops::class);
    }
}
