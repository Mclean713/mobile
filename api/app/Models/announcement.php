<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    protected $fillable = ['user_id','title','effective_date','type','description'];
    /** @use HasFactory<\Database\Factories\AnnouncementFactory> */
    use HasFactory;

     public function User(){
        return $this->belongsTo(User::class);
    }
}
