<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class HasUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = $request->session()->has('user_session');
        if($data){
              $getdata = $request->session()->get('user_session');
             
              $infodata = DB::table('users')->where([['id',$getdata->id]])->count();
           
              if($infodata =='0'){
                   Session::forget('user_session');
                 
                return  redirect(route('login.view'));  
              }
        }
        return $next($request);
    }
}
