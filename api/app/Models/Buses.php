<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buses extends Model
{
    protected $fillable = [
        'name',
        'departure_time',
        'price', 
        'route',
        'available_seats'
    ];
    /** @use HasFactory<\Database\Factories\BusesFactory> */
    use HasFactory;
}
