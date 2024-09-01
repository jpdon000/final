<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order_details;

class DetailsController extends Controller
{
    public function index(){
        $order_details=order_details::all();
        return view('details.index',compact('order_details'));
    }



    public function edit($id){
        if(!$id)
        {
            return redirect()->back();
        }
        $order_details = order_details::find($id);
        if($order_details)
        {
            return view('details.edit',compact('order_details'));
        }
        return redirect()->back();
     }
     

     public function delete($id){                          // for delete data.........................!!
         if(!$id)
         {
             return redirect()->back();
         }
      $order_details = order_details::find($id);
      if($order_details)
      {
         $order_details->delete();
         return redirect()->back()->with('message','Data deleted successfully');;
      }
      return redirect()->back();
     }
     

     

    public function update(Request $request, $id){  // for update.....................!!
        if(!$id)
        {
            return redirect()->back();
        }
     $order_details = order_details::find($id);
     if($order_details)
     {
        $data=[
            'customer_id' => $request->get('customer_id'),
            'payment_id' => $request->get('payment_id'),
            'total' => $request->get('total'),
        ];

        order_details::where('id',$id)->update($data);
        return redirect()->route('details.index')->with('message','Data updated successfully');;
     }
          return redirect()->back();
    }



     
     
     }
     
    

