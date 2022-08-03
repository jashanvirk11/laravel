<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class LoginController extends Controller
{
  public function login(Request $request) {
      
         if($request->ajax()) {
             
            $user_exits = User::where('email',$request->email)->first();
       
            if($user_exits){
              
              if($user_exits->password == md5($request->password)) {
               
                    Session::put('user_session',$user_exits);
                    return response()->json(['success'=>'login']); 
            
                }else{
                     return response()->json(['credential_error'=>'Password does not matched with user ']); 
                }
            }
          
            else{
               
              return response()->json(['user_not_exist'=>'Email does not exist in our Record']); 
              
            } 
         }
         
         
         
         $request->validate([
             
            'email' => 'required',
            'password' => 'required',
            
        ]);
            
         $user_exits = User::where('email',$request->email)->first();
       
            if($user_exits){
              
              if($user_exits->password == md5($request->password)) {
               
                    Session::put('user_session',$user_exits);
                    if($request->from_checkout)
                    {
                        return redirect(route('checkout'));
                    }
                    return redirect(route('index')); 
            
                }else{
                  
                    Session::flash('credential_error','Password does not matched with user');
                    return  redirect()->back();
                    
                }
            }
          
            else{
              
              Session::flash('user_not_exist','Email does not exist in our Record');
                    return  redirect()->back();
              
            } 
       
    }

}
