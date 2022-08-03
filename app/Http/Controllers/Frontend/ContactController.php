<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Mail\contactmail;


class ContactController extends Controller
{
    public function index(){
       
        return view('contact');
    }
    

    
    public function enquiry(Request $request){
         
        $request->validate(['email' => 'required','name' => 'required']);
    
     $user = [
            'title' => 'Mail from Info@uniqueproducts.ca',
            'url' => 'https://uniqueproducts.ca/',
           'name'=>$request->name,
           'email'=>$request->email,
           'message'=>$request->message,
        ];
        
        
        $enquiry= new Enquiry;
        $enquiry->name=$request->name;
        $enquiry->email=$request->email;
        $enquiry->message=$request->message;
        if ($enquiry->save())
        {
             \Mail::to(['Info@uniqueproducts.ca','jshnvirk11@gmail.com'])->send(new \App\Mail\contactmail($user));
            
           
        return view('home');
        return back($status = 30, $headers = [], $fallback = '/contact');
        return back();
        }
        else{
            session::flass('error','Something went wrong while submitting your query,Please submit later');
        }
    }
}
