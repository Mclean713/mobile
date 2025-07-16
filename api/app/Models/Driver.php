<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['FirstName','LastName','Email','phoneNumber','LicenseNumber','user_id'];
    /** @use HasFactory<\Database\Factories\DriverFactory> */
    use HasFactory;

    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
