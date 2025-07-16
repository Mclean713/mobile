<?php

namespace App\Http\Controllers;
use App\Models\Bus;
use App\Models\Buses;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Schedule;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function view(){
        $user = Auth::user()->id;
        $bus = Buses::where('user_id', $user)->count();
        $driver = Driver::where('user_id', $user)->count();
        $route = Route::where('user_id', $user)->count();
        $payment = Payment::where('user_id', $user)->count();
        $latestSchedule = Schedule::orderBy('created_at', 'desc')->first();

        return view("welcome", ['buscount'=>$bus,
                                                'drivercount'=>$driver,
                                                'routecount'=>$route,
                                                'latestSchedule'=>$latestSchedule,
                                                'payment'=> $payment]
                    );
    }
}
