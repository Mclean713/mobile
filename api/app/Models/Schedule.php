<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['user_id','routeId','busId','driverId','StartDate','DepartureTime','Status','price'];
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;

            
     public function route()
    {
        return $this->belongsTo(Route::class, 'routeId');
    }

    public function bus()
    {
        return $this->belongsTo(Buses::class, 'busId');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driverId');
    }
      

    public function manifest(){
      return $this->hasMany(customer::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
