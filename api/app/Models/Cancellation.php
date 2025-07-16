<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancellation extends Model
{
    protected $fillable=['reason','details','customer_id','refund_amount','refund_processed'];
}
