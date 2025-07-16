<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function store(Request $request){ 
      

        $validate = $request->validate([
                'FirstName' =>'required|string',
                'LastName' =>'required|string',
                'Email'=>'required',
                'phoneNumber'=>'required|string',
                'LicenseNumber'=>'required|string'
               
            ]);
        Driver::create([
                'user_id'      => Auth::user()->id,
                'FirstName'    => $validate['FirstName'],
                'LastName'     => $validate['LastName'],
                'Email'        => $validate['Email'],
                'phoneNumber'  => $validate['phoneNumber'],
                'LicenseNumber'=> $validate['LicenseNumber']
        ]);

        return redirect()->route('welcome.index');
    }
    public function view(){
        return view('Driver.AddDriver');
    }
    public function viewlist(){
        $user = Auth::user()->id;
        $driver = Driver::where('user_id', $user)
                          ->orderBy('LastName', 'asc')
                          ->paginate(5);

        return view('Driver.driverlist',['drivers'=> $driver]);
    }

    public function delete($id){
        $driver = Driver::findOrFail($id);

        $driver->delete();
        return redirect()->route('driverlist.view');
    }
    public function edit($id){
        $driver = driver::findOrFail($id);

        return view('Driver.editDriver',['driver'=> $driver]);
    }
     public function update(Request $request,$id){
         $validate = $request->validate([
                'FirstName' =>'required|string',
                'LastName' =>'required|string',
                'LicenseNumber'=>'required|string',
                'type'=>'required',
                'status'=>'required|string'
            ]);
          $driver = Driver::findOrFail($id);
          $driver->update($validate);

        return redirect()->route('driverlist.view');
    }
}
