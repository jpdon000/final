<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
class PaymentController extends Controller
{
   public function index(){
    $payments=payment::all();
    return view('payments.index',compact('payments'));
   }


   public function edit($id){
   if(!$id)
   {
       return redirect()->back();
   }
   $payments = payment::find($id);
   if($payments)
   {
       return view('payments.edit',compact('payments'));
   }
   return redirect()->back();
}


public function update(Request $request, $id){  // for update.....................!!
    if(!$id)
    {
        return redirect()->back();
    }
 $payments = payment::find($id);
 if($payments)
 {
    $data=[
        'order_id' => $request->get('order_id'),
        'amount' => $request->get('amount'),
        'payment_type' => $request->get('payment_type'),
    ];
    payment::where('id',$id)->update($data);
    return redirect()->route('payments.index')->with('message','Data updated successfully');;
 }
      return redirect()->back();
}




public function delete($id){                          // for delete data.........................!!
    if(!$id)
    {
        return redirect()->back();
    }
 $payments = payment::find($id);
 if($payments)
 {
    $payments->delete();
    return redirect()->back()->with('message','Data deleted successfully');;
 }
 return redirect()->back();
}



}
