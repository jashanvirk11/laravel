<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Session;

class RegisterController extends Controller
{

     public function register(Request $request) {
     
         $request->validate([
             'name' => 'required',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
         
       
        if($request->ajax()) {
            $email_exist = User::where('email',$request->email)->first();
            if($email_exist) {
                
                return response()->json(['email_exist'=>'Email is already Exist']);
            }
            $phone_exist = User::where('phone',$request->phone)->first();
            if($phone_exist) {
                return response()->json(['phone_exist'=>'phone Number is already Exist']); 
            }
            
            $user = User::create(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone,'password'=>md5($request->password)]);
            
            if($user)
            {
              return back()->with('success','you have registered successfully');
            }
            else
            {
               
           return back()->with('error','Oops Something Went Wrong while Creating User');  
            }
    
                
            Session::put('user_session',$user);
            if($user->id && Session::get('user_session')) {
            
                return response()->json(['success'=>'1']); 
           
            }else{
                
               return response()->json(['error'=>'Oops Something Went Wrong while Creating User']); 
               
            }
        }
        
        $email_exist = User::where('email',$request->email)->first();
        // if($email_exist) {
            
        //     Session::flash('email_exist','Email is already Exist');
        //     return  redirect()->back();
        // }
        // $phone_exist = User::where('phone',$request->phone)->first();
        // if($phone_exist) {
           
        //     Session::flash('phone_exist','phone Number is already Exist');
        //     return  redirect()->back();
        // }
        

      
        // dd($response);
        
        $user = User::create(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone,'password'=>md5($request->password)]);
          
            
        Session::put('user_session',$user);
     
        
        if($user->id && Session::get('user_session')) {
            if($request->from_checkout)
            {
                return redirect(route('checkout'));
            }
             Session::flash('success','Registered Successfully');
           return redirect(route('login.view'));
       
        }else{
            
            Session::flash('error','Oops Something Went Wrong while Creating User');
            return  redirect()->back();
          
           
        }
        
       
    }
    
}

 
