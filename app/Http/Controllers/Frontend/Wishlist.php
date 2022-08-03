<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wlist;

class Wishlist extends Controller
{
     public function addToWishlist($product_id) {
     
        if(session()->has('user_session')){
                 $wishitem = Wlist::where('product_id',$product_id)->first();
          
                 if($wishitem){
                      $response = Wlist::where([['product_id',$product_id],['user_id',session()->get('user_session')->id]])->delete();
                 
                      if($response){
                          Session::flash('remove','item remove from wishlist');
                           return redirect()->back();
                      }else{
                           Session::flash('error','something went wrong');
                            return redirect()->back();  
                          
                      }
                 }else{
                    $wishlist = new Wlist;
                    $wishlist->user_id =session()->get('user_session')->id;
                    $wishlist->product_id =$product_id;
                    if($wishlist->save()){
                         Session::flash('success','item added to wishlist');
                        return redirect()->back();
                    } 
                 }
              
          }else{
              return redirect(route('login.view'));
          }
    
    }
    public function removeFromWishlist($product_id){
        if(session()->has('user_session')){
            $wishitem = Wlist::where('product_id',$product_id)->first();
            if($wishitem){
                  $response = Cart::where([['status','==','ordered'],['user_id',Session::get('user_session')->id]])->delete();
            }
            else{
                    $wishlist = new Wlist;
                    $wishlist->user_id =session()->get('user_session')->id;
                    $wishlist->product_id =$product_id;
                    if($wishlist->save()){
                         Session::flash('success','item added to wishlist');
                        return redirect()->back();  
                 }
            
                
            
        }
    }
    }
}
