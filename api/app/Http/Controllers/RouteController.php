<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{

    public function store(Request $request){ 
         $request->validate([
        'routeName' => 'required|string',
        'Start_area' => 'required|string',
        'Start_district' => 'nullable|string',
        'destination_district' => 'nullable|string',
        'destination_area' => 'nullable|string',
        'busStops' => 'array',
        'busStops.*' => 'nullable|string'
    ]);

    
    $route = Route::create([
        'user_id'        => Auth::user()->id,
        'routeName'      => $request->routeName,
        'Start_area'     => $request->Start_area,
        'Start_district' => $request->Start_district,
        'destination_district' => $request->destination_district,
        'destination_area' => $request->destination_area
    ]);

     if ($request->busStops) {
        foreach ($request->busStops as $stop) {
            if (!empty($stop)) {
                $route->busStops()->create(['name' => $stop]);
            }
        }
     }

        return redirect()->route('routelist.view');
    }
    public function edit($id){
        $route = Route::findOrFail($id);

        return view('route.editRoute',['route'=> $route]);
    }
    public function viewlist(){
        $user = Auth::user()->id;
        $route = Route::where('user_id', $user)
                          ->orderBy('routeName', 'asc')
                          ->paginate(6);

        return view('Route.routelist',['routes'=> $route]);
    }
    public function view(){

        $user = Auth::user()->id;
        $route = Route::where('user_id', $user)
                          ->orderBy('routeName', 'asc')
                          ->paginate(6);
        return view('Route.AddRoute',['routes'=> $route]);
    }
    public function delete($id){
        
         $Route = Route::findOrFail($id);

        $Route->delete();
        return redirect()->route('routelist.view');

    }
    public function update(Request $request,$id){
         $validate = $request->validate([
                'routeName' => 'required|string',
                'Start_area' => 'required|string',
                'Start_district' => 'nullable|string',
                'destination_district' => 'nullable|string',
                'destination_area' => 'nullable|string',
            ]);
          $route = Route::findOrFail($id);
          $route->update($validate);

        return redirect()->route('routelist.view');
    }
}
