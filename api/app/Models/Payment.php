<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id','MethodName','PaymentType','fee','acountNumber','code','phoneNumber','Decription'];

    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

     public function user(){
        return $this->belongsTo(User::class);
    }
}
