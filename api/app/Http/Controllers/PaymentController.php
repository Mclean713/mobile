<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function store(Request $request){
          $payment = $request->validate([
                "MethodName" => "string|required",
                "PaymentType"=> "string|required",
                "fee"=>"required",
                "acountNumber"=>"",
                "code"=>"",
                "phoneNumber"=>"",
                "Decription"=>"string|required"

          ]);
           Payment::create([
                'user_id'        => Auth::user()->id,
                'MethodName'     => $payment['MethodName'],
                'PaymentType'    => $payment['PaymentType'],
                'fee'            => $payment['fee'],
                'acountNumber'   => $payment['acountNumber'],
                'code'           => $payment['acountNumber'],
                'phoneNumber'    => $payment['phoneNumber'],
                'Decription'     => $payment['Decription']
                ]);
          return redirect()->route('welcome.index');
    }
    public function viewlist(){
            $user = Auth::user()->id;
            $payment = Payment::where('user_id', $user)
                          ->orderBy('MethodName', 'asc')
                          ->paginate(6);

            return view('payment.paymentlist',['payments'=> $payment]);
    }
    public function delete($id){
        $payment = Payment::findOrFail($id);

        $payment->delete();
        return redirect()->route('paymentlist.view');
    }
    
    public function edit($id){
        $payment= Payment::findOrFail($id);

        return view('payment.editPayment',['payment'=> $payment]);
    }
}
