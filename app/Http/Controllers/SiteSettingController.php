<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSettings;

class SiteSettingController extends Controller
{
public function store(Request $request){
    try{

       
          $image = '';
          if($request->image && $request->hasfile('image')){
         $file = $request->image;
          $filename = time().'-'.rand(1000,100000).'-'. $file->getClientOriginalName();
             $path = public_path().'/site_setting_upload'; 
           $file->move($path,$filename);
            $image = $filename;
          }
        

           // dd($data);

            SiteSettings::set('name',$request->name);
            SiteSettings::set('footer',$request->footer);
            SiteSettings::set('contact',$request->contact);
            SiteSettings::set('logo',$request->name);
            SiteSettings::set('email',$request->email);
            SiteSettings::set('slogan',$request->slogan);
            SiteSettings::set('image',$image);
        
            $request->session()->flash('success','Data inserted successfully');
            return redirect()->route('sitesetting');
           

    }catch(\Exception $e){
        $request->session()->flash('error','somthing went wrong');
        return redirect()->route('sitesetting');

    }

}
}