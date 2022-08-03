<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Session;

class CheckoutController extends Controller
{
    public function checkout(){
    
        if(session()->has('cart') && count(session()->get('cart')) >0 && session()->has('user_session'))
        {
              
            foreach(session()->get('cart') as $key => $value)
            {
                //  dd($value);
            //     dd(session()->get('user_session')->id);
            //   dd(session()->get('cart')[$key]['product_id']);
            $product_exist = Cart::where([['user_id',session()->get('user_session')->id],['product_id',session()->get('cart')[$key]['product_id']]])->first();
            // dd($product_exist->qty ==session()->get('cart')[$key]['quantity']);
           
                if(!$product_exist)
                {
                    // dd(!$product_exist);
                  $cart = new Cart;
                  $cart->user_id = session()->get('user_session')->id;
                  $cart->product_id = session()->get('cart')[$key]['product_id'];
                  $cart->product_name = session()->get('cart')[$key]['name'];
                  $cart->price = session()->get('cart')[$key]['price'];
                  $cart->qty = session()->get('cart')[$key]['quantity'];
                  $cart->image = session()->get('cart')[$key]['image'];
                  $cart->save();
        
                }else
                {
                   
                    Cart::where('product_id',session()->get('cart')[$key]['product_id'])->update(['qty'=>session()->get('cart')[$key]['quantity']]);
                //   return view('pages.checkout'); 
                // continue;
                // dd('update cart');
                }
            }
            
            Session::forget('cart');
            return view('pages.checkout'); 
            
        }else if(session()->has('user_session')){
            Session::forget('cart');
            return view('pages.checkout');
        }
        else
        {
            //   dd('login to checkout');
            return view('register-login',['checkout'=>true]);
        }
    }
    
}
// <?php

// namespace App\Http\Controllers\Frontend;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Cart;
// use App\Models\Wlist;
// use App\Models\Order;
// use App\Models\Product;
// use App\Models\User;
// use Session;
// use App\Http\Controllers\api\ApiController;

// class CheckoutController extends Controller
// {
//     public function checkout(){
  
//             //   dd(Session::get('cart'));
//         // foreach(Product::all() as $product){
//         //   $product->where('sub_category_id',14)->update(['gst'=>12]); 
//         // }
//         //   dd(Session::get('cart'));
//         // foreach(Product::select(['weight','id'])->get() as $product){
//         //     $weight = str_replace("k","",$product->weight);
//         //     $weight = trim($weight);
//         //     Product::where('id',$product->id)->update(['weight'=>$weight]);
             
//         // }
      
//         // dd(Session::get('cart'));
        
//         if(session()->has('cart') && count(session()->get('cart')) >0 && session()->has('user_session'))
//         {
             
//             foreach(session()->get('cart') as $key => $value)
//             {
              
//             //     dd(session()->get('user_session')->id);
//             //   dd(session()->get('cart')[$key]['product_id']);
//             $product_exist = Cart::where([['user_id',session()->get('user_session')->id],['product_id',session()->get('cart')[$key]['product_id']]])->first();
//             // dd($product_exist->qty ==session()->get('cart')[$key]['quantity']);
           
//                 if(!$product_exist)
//                 {
//                     // dd(!$product_exist);
//                   $cart = new Cart;
//                   $cart->user_id = session()->get('user_session')->id;
//                   $cart->product_id = session()->get('cart')[$key]['product_id'];
//                   $cart->product_name = session()->get('cart')[$key]['name'];
//                   $cart->price = session()->get('cart')[$key]['price'];
//                   $cart->qty = session()->get('cart')[$key]['quantity'];
                  
//                 //   $cart->weight = session()->get('cart')[$key]['weight'];
//                 //   $cart->gst = session()->get('cart')[$key]['gst'];
                  
//                   $cart->image = session()->get('cart')[$key]['image'];
//                   $cart->save();
        
//                 }else
//                 {
                
//                     Cart::where('product_id',session()->get('cart')[$key]['product_id'])->update(['qty'=>session()->get('cart')[$key]['quantity']]);
//                 //   return view('pages.checkout'); 
//                 // continue;
//                 // dd('update cart');
//                 }
//             }
            
//             Session::forget('cart');
            
//             $cart = Cart::where([['status','!=','ordered'],['user_id',session()->get('user_session')->id]])->get(); 
//             $total_weight = $this->getTotalWeight();
//             $courier_details=[];
//             $user = User::findOrFail(session()->get('user_session')->id);
//             //   dd($courier_details);
//             // if($user->zip){
//             //     $courier_details = ApiController::getLogisticPrice($total_weight,session()->get('user_session')->zip);
//             //     $courier_details['total_weight'] = $total_weight;
//             //  }
//         //  dd($courier_details);
//          if(empty($courier_details)){
//             $courier_details['rate'] = 0;
//             $courier_details['courier_name'] = 0;
//             $courier_details['courier_company_id'] = 0;
//             $courier_details['total_weight'] = $total_weight;
//         }
//         return view('pages.checkout',['courier_details'=>$courier_details]); 
            
//         }else if(session()->has('user_session')){
      
//         //       Session::forget('cart');
//         $cart = Cart::where([['status','!=','ordered'],['user_id',session()->get('user_session')->id]])->get(); 
       
//         $total_weight = $this->getTotalWeight();
       
//         $courier_details=[];
//         $user = User::findOrFail(session()->get('user_session')->id);
//         // dd($user);
//         // if($user->zip){
//         //     $courier_details = ApiController::getLogisticPrice($total_weight,$user->zip);
//         //     $courier_details['total_weight'] = $total_weight;
//         //     //  dd($courier_details);
//         // }
//     //  dd($courier_details);
//     // dd($this->getPriceByPostCodeAndWeight($user->zip));
//         if(empty($courier_details)){
//             $courier_details['rate'] = 0;
//             $courier_details['courier_name'] = 0;
//             $courier_details['courier_company_id'] = 0;
//             $courier_details['total_weight'] = $total_weight;
//         }
//         return view('pages.checkout',['courier_details'=>$courier_details]);
//         }
//         else
//         {
        
//             return view('register-login',['checkout'=>true]);
//         }
//     }
    
//     public function getTotalWeight(){
//         $cart = Cart::where([['status','!=','ordered'],['user_id',session()->get('user_session')->id]])->get(); 
//         $total_weight = 0;
//         $courier_details=[];
//          $user = User::findOrFail(session()->get('user_session')->id);
//          foreach($cart as $cart){
//              $total_weight += $cart->weight * $cart->qty;
//          }
//          return $total_weight;
//     }
    
//     public function getPriceByPostCodeAndWeight($postcode){
//          $courier_details=[];
//          $user = User::findOrFail(session()->get('user_session')->id);
         
//              $total_weight = $this->getTotalWeight();
//              $courier_details = ApiController::getLogisticPrice($total_weight,$postcode); 
//              if($courier_details['status']){
//                 return response()->json(['data'=>$courier_details],200);
//              }else{
//                 return response()->json(['data'=>$courier_details],404);
//              }
//     }
    
// }
