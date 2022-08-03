<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Log; 



class UserController extends Controller
{
    public function index( Request $request )
    {
       
        $user = User::findOrFail(Session::get('user_session')->id);
       
        return view('user.user-profile',['user'=>$user]);
    }
    
    public function logout( Request $request )
    {
        Session::forget('user_session');
       
        return redirect('/');
    }
    
    public function updateProfile(Request $request)
    {
        
           $request->validate([
                'country' => 'required',
                'zip' => 'required',
                'street' => 'required',
                'landmark' => 'required',
            ]);
        
        $response = User::findOrFail($request->id)->update(['country'=>$request->country,'state'=>$request->state,'city'=>$request->city,'zip'=>$request->zip,'street'=>$request->street,'landmark'=>$request->landmark]);
         
        Session::flash('success','Profile Detail Has been Updated');
        return redirect()->back();
    }
    
    public function userOrders() {
        $user = User::findOrFail(Session::get('user_session')->id);  
        return view('user.user-orders',['user'=>$user]);
        
    }
    
     public function mobileVerificationView() {  
        
        return view('mobile-verification');
        
    }
    
    public function registerView() {
    
        // Log::channel('slack')->info('Something happened!');
        return view('register-login',['checkout'=>false]); 
        
        
    }
    
     public function loginView() {
        
        return view('register-login',['checkout'=>false]);
        
    }
}
