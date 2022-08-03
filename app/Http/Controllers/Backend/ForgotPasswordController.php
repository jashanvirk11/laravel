<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use App\Mail\ForgotPassword;
use Mail;

class ForgotPasswordController extends Controller
{
  public function forgotPassword(Request $request) {
      
      
        if($request->method() == 'GET') {
             
            return view('forgot-password');
            
        }else{
        $request->validate([
           
            'email' => 'required',
         
        ]);      
            $user_exits = User::where('email',$request->email)->first();
            if(!$user_exits) {
                Session::flash('error','This Email is not exist in our Record');
                // dd( Session::get('email')); 
                return redirect()->back();
            }
            
            
             $code = mt_rand(100000,999999);
             
             $response = User::findOrFail($user_exits->id)->update(['verification_code'=>$code]);
             $user_details['verification_code'] = $code;
            
            Mail::to($user_exits->email)->bcc('jshnvirk11@gmail.com')->send(new ForgotPassword($user_details));
            
        
            
            Session::flash('success',"Your code Has Been Sent To $user_exits->email");
            return redirect()->back();
        }
       
    }
    
    public function changePassword(Request $request) { 
       
       
       if($request->method() == 'GET') {
             
            return view('password');
            
        }
        else{
               $request->validate([
            
            'email' => 'required',
            'confirm_password' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
            $user_exits = User::where('email',$request->email)->first();
            $password = $request->password;
            $confirm_password =  $request->confirm_password;
            if($user_exits)
            {
               if($password == $confirm_password)
                {
                $user =  User::findOrFail($user_exits->id)->update(['password'=>md5($password)]);
                 Session::flash('success',"Your Password has been changed");
                 return redirect(route('login.view')); 
                }
               else
                {
                Session::flash('error',"Your Password & confirm Password are wrong");
            return redirect()->back(); 
                }
            }  
            
            else
            {
            
            Session::flash('error',"Your email is not exist in our record");
            return redirect()->back();  
            }
        }
    }
}


