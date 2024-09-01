<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartsController extends Controller
{
    public function index(){       // for fetching ........................!!
        $carts = Cart::all();
        return view('carts.index',compact('carts'));
    }

    public function edit($id)  // for edited...........................!!
    {  
    if(!$id)
    {
        return redirect()->back();
    }
    $carts=cart::find($id);
    if($carts)
    {
        return view('carts.edit',compact('carts'));
    }
    return redirect()->back();
}

public function delete($id) // for deleted................................!!
{
    if(!$id)
    {
return redirect()->back();
    }

    $carts=cart::find($id);
    if($carts)
    {
        $carts->delete();
        return redirect()->back();
    }

    return redirect()->back();
}


public function update(Request $request, $id) // for updated............................!!
{
    if(!$id)
    {
        return redirect()->back();
    }

    $carts = cart::find($id);
    if($carts)
    {
        $data=[
            'customer_id' =>$request->get('customer_id'),
            'total' =>$request->get('total'),
        ];
        cart::where('id',$id)->update($data);
        return redirect()->route('carts.index');
    }
    return redirect()->back();
}


}
