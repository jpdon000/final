<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();                         
        return view('users.index',compact('users')); // only for fetch data from database table................... return view('user',compact('users'));
    } 

    public function create(){                       // For create data...........................!!
        return view('users.create');
    }

     public function store(Request $request){      // For store data.........................!!
     
        $image = '';
        if($request->image && $request->hasfile('image')){
            $file = $request->image;
            $filename = time().'-'.rand(1000,100000).'-'.$file->getClientOriginalName();
            $path = public_path().'/uploads_user';
            $file->move($path,$filename);
            $image = $filename;
        }
     
        $data = [
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'phone' => $request->get('phone'),
        'password' =>bcrypt($request->get('password')),
        'image'=> $image
      ];
      User::insert($data);
      return redirect()->route('users.index')->with('message','Data is inserted successfully');
     }



     public function delete($id){                  //For delete....................!!
        if(!$id)
        {
            return redirect()->back();
        }

        $user = User::find($id);
        if($user)
        {
            $user->delete();
            return redirect()->back()->with('message','Data is deleted successfully');
        }
            return redirect()->back();
        }


     public function edit($id){                  // For edit..............................!!
        if(!$id)
        {
            return redirect()->back();
        }

        $user = User::find($id);
        if($user)
        {
            return view('users.edit',compact('user'));
        }
             return redirect()->back();
     }



     public function update(Request $request,$id){      // For Update...............................!!
        if(!$id)
        {
            return redirect()->back();
        }

        $user = User::find($id);
        if($user){

            $image = '';
            if($request->image && $request->hasfile('image')){
                $delete_path = public_path().'/uploads_user'.$user->image;
                $file = $request->image;
                $filename = time().'-'.rand(1000,100000).'-'.$file->getClientOriginalName();
                $path = public_path().'/uploads_user';
                $file->move($path,$filename);
                $image = $filename;
            }

            $data = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'password' => $request->get('password'),
                'image' =>  $image
              ];    
              User::where('id',$id)->update($data);
              return redirect()->route('users.index')->with('message','Data is updated successfully');
        }
        return redirect()->back();
       }

}





// Insert:- In this method, we  all data are submit .This data are show directly is True or False


// create:- In this method, we  all data are submit . that data we are  submitted this data are show 
