<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductController extends Controller
{
    public function index(){
        $data['products'] = products::all();
        return view ('products.index',$data);
    }

    public function create(){               // for create data..............................!!
        
            return view('products.create'); 
    }


    public function store(Request $request){      // For store data.........................!!
     $request->validate([
        'name' => 'required',
        'price' => 'required',
        'image' => 'required|mimes:jpeg,bmp,png,jpg'
     ]);



        $image = '';
        if($request->image && $request->hasfile('image')){
          $file = $request->image;
          $filename = time().'-'.rand(1000,100000).'-'. $file->getClientOriginalName();
          $path = public_path().'/uploads'; 
          $file->move($path,$filename);
          $image = $filename;
        }
        
        $data = [
          'name' => $request->get('name'),
          'price' => $request->get('price'),
          'description' => $request->get('description'),
          'category' => $request->get('category'),
          'quantity' => $request->get('quantity'),
          'status' => $request->get('status'),
          'image' => $image
        ];
        products::insert($data);
        return redirect()->route('products.index')->with('message','Data inserted successfully');
       }



    public function edit($id){                     // for edit data................................!!
        if(!$id)
        {
            return redirect()->back();
        }
        $data = products::find($id);
        if($data)
        {
            return view('products.edit',compact('data'));
        }
        return redirect()->back();
    }



    public function delete($id){                          // for delete data.........................!!
        if(!$id)
        {
            return redirect()->back();
        }
     $data = products::find($id);
     if($data)
     {
        $data->delete();
        return redirect()->back()->with('message','Data deleted successfully');;
     }
     return redirect()->back();
    }



    public function update(Request $request, $id){  // for update.....................!!
        if(!$id)
        {
            return redirect()->back();
        }
     $dat = products::find($id);
     if($dat){

        $image = '';
        if($request->image && $request->hasfile('image')){
          $delete_path=public_path().'/uploads'.$dat->image; 
          $file = $request->image;
          $filename = time().'-'.rand(1000,100000).'-'. $file->getClientOriginalName();
          $path = public_path().'/uploads'; 
          $file->move($path,$filename);
          $image = $filename;
        }
       

        $dat=[
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'quantity' => $request->get('quantity'),
            'status' => $request->get('status'),
            'image' => $image
        
        ];
        products::where('id',$id)->update($dat);
        return redirect()->route('products.index')->with('message','Data updated successfully');;
     }
          return redirect()->back();
    }
}
