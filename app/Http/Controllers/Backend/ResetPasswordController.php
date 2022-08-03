<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    public function resetPassword($id,Request $request) {
          
        if($request->method() == 'GET') 
        {
           
        return view('email-verification',['id'=>$id]);
        }
     
       
    //   $user_exits = User::where('verification_code',$request->verification_code)->get();
    //   dd( User::where('verification_code',$request->verification_code)->get());
       if($request->verification_code != $id ) {
                Session::flash('error','The Verification code is not correct');
               
                return redirect()->back();
            }
            else
            {
          Session::flash('success',"You can change your password");
            return  redirect()->route('user.password');
            }
       }
    
}
