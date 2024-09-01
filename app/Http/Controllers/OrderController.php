<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{

     public function index()
     {
        $orders=order::all();
        return view('orders.index',compact('orders'));
    }   


    public function edit($id){                     // for edit data................................!!
        if(!$id)
        {
            return redirect()->back();
        }
        $orders = order::find($id);
        if($orders)
        {
            return view('orders.edit',compact('orders'));
        }
        return redirect()->back();
    }


    public function update(Request $request, $id){  // for update.....................!!
        if(!$id)
        {
            return redirect()->back();
        }
     $orders = order::find($id);
     if($orders)
     {
        $data=[
            'product_id' => $request->get('product_id'),
            'customer_id' => $request->get('customer_id'),
            'quantity' => $request->get('quantity'),
        ];
        order::where('id',$id)->update($data);
        return redirect()->route('orders.index')->with('message','Data updated successfully');;
     }
          return redirect()->back();
    }




    public function delete($id){                          // for delete data.........................!!
        if(!$id)
        {
            return redirect()->back();
        }
     $orders = order::find($id);
     if($orders)
     {
        $orders->delete();
        return redirect()->back()->with('message','Data deleted successfully');;
     }
     return redirect()->back();
    }



}
