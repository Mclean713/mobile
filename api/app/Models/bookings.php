<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    protected $fillable = [
        'user_id',
        'customer_id',
        'bus_id',
        'amount',
        'status',
        'cancelled_at',
    ];
}
