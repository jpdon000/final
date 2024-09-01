<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\wishlist;

class WishlistsController extends Controller
{
    public function index(){
        $wishlists = wishlist::all();
        return view('wishlists.index',compact('wishlists'));
       }
    
    
       public function edit($id){   // for edit...........................!!
       if(!$id)
       {
           return redirect()->back();
       }
       $wishlists = wishlist::find($id);
       if($wishlists)
       {
           return view('wishlists.edit',compact('wishlists'));
       }
       return redirect()->back();
    }
    
    
    public function update(Request $request, $id){  // for update.....................!!
        if(!$id)
        {
            return redirect()->back();
        }
     $wishlists = wishlist::find($id);
     if($wishlists)
     {
        $data=[
            'customer_id' => $request->get('customer_id'),
            'product_id' => $request->get('product_id'),
            
        ];
        wishlist::where('id',$id)->update($data);
        return redirect()->route('wishlists.index')->with('message','Data updated successfully');;
     }
          return redirect()->back();
    }
    
    
    
    
    public function delete($id){                          // for delete data.........................!!
        if(!$id)
        {
            return redirect()->back();
        }
     $wishlists = wishlist::find($id);
     if($wishlists)
     {
        $wishlists->delete();
        return redirect()->back()->with('message','Data deleted successfully');;
     }
     return redirect()->back();
    }
    
    
    
}
