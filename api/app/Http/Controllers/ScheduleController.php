<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Driver;
use App\Models\Payment;
use App\Models\Route;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function store(Request $request){ 
        $validate = $request->validate([
                'routeId' =>'required',
                'busId'=>'required',
                'driverId'=>'required',
                'StartDate'=>'required',
                'DepartureTime'=>'required',
                'status'=>'',
                'price'=>'required'
            ]);
        Schedule::create([
             'user_id'            => Auth::user()->id,
             'routeId'            => $validate['routeId'],
             'busId'              => $validate['busId'],
             'driverId'           => $validate['driverId'],
             'StartDate'          => $validate['StartDate'],
             'DepartureTime'      => $validate['DepartureTime'],
             'status'             => $validate['status'],
             'price'              => $validate['price'],

        ]);

        return redirect()->route('welcome.index');
    }
    public function view(){

        $user = Auth::user()->id;
        $bus = Bus::where('user_id', $user)->get();
        $driver = Driver::where('user_id', $user)->get();
        $route = Route::where('user_id', $user)->get();
        $schedule = Schedule::with(['route', 'bus', 'driver'])->get();

        return view('/schedule', ['buses'=>$bus,'drivers'=>$driver,'routes'=>$route,'schedules'=>$schedule]);
    }
    public function destroy($id){
        $schedule = Schedule::findOrFail($id);
       
        $schedule->delete();
        return redirect()->route('schedule.view');
    }
    public function editView($id){
         $schedule = Schedule::findOrFail($id);
         $user = Auth::user()->id;
         $bus = Bus::where('user_id', $user)->get();
         $driver = Driver::where('user_id', $user)->get();
         $route = Route::where('user_id', $user)->get();

        return view('ScheduleEdit',['buses'=>$bus,'drivers'=>$driver,'routes'=>$route,'schedule'=> $schedule]);
    }
    public function edit(Request $request,$id){
         $validate = $request->validate([
                'routeId' =>'required',
                'busId'=>'required',
                'driverId'=>'required',
                'StartDate'=>'required',
                'DepartureTime'=>'required',
                'status'=>'',
                'price'=>'required'
            ]);
       $schedule = Schedule::findOrFail($id);
       $schedule->update($validate);
       return redirect()->route('schedule.view');
    }
}
