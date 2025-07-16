<?php

namespace App\Http\Controllers;

use App\Models\Manifest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainfestController extends Controller
{
    
    public function view(){
       $user = Auth::user()->id;
       $passengers = Manifest::where('user_id', $user)
                          ->orderBy('surname', 'asc')
                          ->paginate(7);

       return view ('manifest', ['passengers'=> $passengers]);
    }
}
