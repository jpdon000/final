<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function login(Request $request){
        
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:6'
        ]);

        //if check  user exists

        $user =User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
            Auth::login($user);
            $request->session()->flash('sucess','login successfully');
            return redirect()->route('test');
           

        }else{
        $request->session()->flash('error','check your email and password');
        return redirect()->back();
        }

  }else{
    $request->session()->flash('error',' check your email and password');
    return redirect()->back();
}
}


public function store(Request $request){
    $request->validate([
        'name' => 'required',
        'username' => 'required|unique:users,username',
        'email' => 'required|unique:users,email',
        'password' => 'required|min:6|confirmed'
    ]);


    $data =[
        'name'=> $request->get('name'),
        'username'=>$request->get('username'),
        'email'=>$request->get('email'),
        'phone' => $request->get('phone'),
        'password' =>bcrypt($request->password)
    ];
    User::insert($data);
    $request->session()->flash('success','Create successfully');
    return redirect()->route('login');
}
}