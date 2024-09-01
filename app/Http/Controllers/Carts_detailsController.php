<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart_details;


class Carts_detailsController extends Controller
{
    public function index()      // for fetching......................!!
    {
        $carts_details = cart_details::all();
        return view('carts_details.index',compact('carts_details'));
    }

    public function edit($id)  // for edit...................!!
    {
        if(!$id)
        {
            return redirect()->back();
        }

        $carts_details =cart_details::find($id);
        if($carts_details)
        {
            return view('carts_details.edit',compact('carts_details'));
        }
        return redirect()->back();
    }



    public function delete($id)  // for deleted.....................!!
    {
        if(!$id)
        {
            return redirect()->back();
        }

        $carts_details = cart_details::find($id);
        if($carts_details)
        {
            $carts_details->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }

public function update(Request $request, $id) // for update...............!!
{
    if(!$id)
    {
        return redirect()->back();
    }

    $carts_details = cart_details::find($id);
    if($carts_details)
    {
        $data=[
            'cart_id' => $request->get('cart_id'),
            'product_id' => $request->get('product_id'),
            'quantity' => $request->get('quantity'),

        ];
        cart_details::where('id',$id)->update($data);
        return redirect()->route('carts_details.index');
    }
    return redirect()->back();
}

}
