<?php

namespace App\Http\Controllers;

use App\Models\Buses;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index(){
        $buses = Buses::all();

        return $buses;
    }
}
