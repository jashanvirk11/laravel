<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\ShippingDetail;
use App\Models\Payment;
use App\Mail\OrderRegister;
use App\Models\Wlist;
use Mail;
use Session;
use Exception;
use Illuminate\Support\Facades\DB;

class CheckoutControllerr extends Controller
{
    public function index(Request $request)
    {
   
         $getdata = $request->session()->get('user_session');
          
       
        if(Session::has('user_session'))
        {
           $sub_total=0;
             $getdata = $request->session()->get('user_session');
             foreach(DB::table('carts')->where('user_id',$getdata->id)->get()  as $a)
             {
             
                 $price = $a->price;
                 $quantiry = $a->qty;
            //  $sub_total = DB::table('carts')->where('user_id',$getdata->id)->get();
            
           $sub_total +=  $price * $quantiry;
        
           
        }
      
    
     $gst = (13/100)*$sub_total; 
    //  $gst = number_format($gst,3);
     
     $shipping_charges= $sub_total >=75 ? 0 :3.99;
     $total = $sub_total+$gst+$shipping_charges;
     $total = number_format($total,2);
     $total = (float)$total;
     

    
    // $total = number_format($total);
       $validated = $request->validate([
        'name' => 'required',
        'country' => 'required',
        'state' => 'required',
        'city' => 'required',
        'postcode' => 'required', 
        'street' => 'required', 
        'phone' => 'required',
        'email' => 'required',
        
              
    ]);

        $shipping_detail = ShippingDetail::create([
                'name'=>$request->name,
                'user_id'=>Session::get('user_session')->id,
                'country'=>$request->country,
                'state'=>$request->state,
                'city'=>$request->city,
                'postcode'=>$request->postcode,
                'address'=>$request->street,
                'landmark'=>$request->landmark,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'description'=>$request->description,
            ]);
       

        }
        return view('Payment.payment',['total'=>$total]);
    }
    
    public function charge(Request $request)
    {
          
   
        $getdata = $request->session()->get('user_session');
          
           foreach( DB::table('carts')->where('user_id',$getdata->id)->get() as $cart_ids){
                 
                $products_ids[] = $cart_ids->product_id;
                $product_name[]= $cart_ids->product_name;
               
             }
           
           
              


        if(Session::has('user_session'))
        {
              $sub_total= 0;
             $getdata = $request->session()->get('user_session');
             foreach(DB::table('carts')->where('user_id',$getdata->id)->get()  as $a)
             {
               
                 $price = $a->price;
                 $quantiry = $a->qty;
            //  $sub_total = DB::table('carts')->where('user_id',$getdata->id)->get();
           $sub_total +=  $price * $quantiry;
           
        }
       
      $gst = (13/100)*$sub_total; 
     $gst = number_format($gst,3);
     
     $shipping_charges= $sub_total >=75 ? 0 :3.99;
     $total = $sub_total+$gst+$shipping_charges;
     $total = number_format($total,2);
     $total = (float)$total;
     
     
    
    try {
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $customer = Customer::create(array(
        'email' => $request->stripeEmail,
        'source' => $request->stripeToken
    ));

    $payment = Charge::create(array(
        'customer' => $customer->id,
        'amount' => $total*100 ,
        'currency' => 'cad',
         "description" => implode(",",$product_name)
    ));

       /*
            ***************************************************************
            ***** Store Transaction Details in table ********
            **************************************************************
            */
        
            $payment_response = Payment::create([
                'user_id'=>Session::get('user_session')->id,
                'transaction_id'=>$payment['id'],
                'method'=>'card',
                'amount'=>$payment['amount']/100 ,
                'status'=>$payment['status'],
                'bank'=>$payment['bank'],
                'isCaptured'=>$payment['captured'],
                'description'=>$payment['description'],
                'wallet'=>$payment['wallet'],
                'vpa'=>$payment['vpa'],
                'fee'=>$payment['fee'],
                'tax'=>$payment['tax'],
                'error_code'=>$payment['error_code'],
                ]);

            /*
            ***************************
            ***** Create  Order ********
            ***************************
            */
            
        //   $invoice = Order::orderBy('id', 'desc')->first();
        //     $year_month = date('Y/m/d/');
      
        //     if($invoice){
        //         $last_invoice = explode("/",$invoice->product_order_id);
        //         $invoice = $invoice->product_order_id;
        //         // $invoice = str_replace($year_month,"",$invoice);
        //         $invoice = $last_invoice[array_key_last($last_invoice)] + 1;
                 
        //         $invoice =date('Y/m/d').'/'.$invoice;
                
        //     }else{
        //         $invoice = date('Y/m/d/').'1';
        //     }
            
            $user = User::findOrFail(Session::get('user_session')->id);
            // dd(implode(':',$getdata->product_id));
              $shipping_detail = ShippingDetail::where('user_id',$getdata->id)->orderBy('created_at', 'desc')->first();
           
   $order = Order::create([
               'product_order_id'=>'1313-'.rand(100000,999999),
               'user_id'=>Session::get('user_session')->id,
               'payment_id'=>$payment_response->id,
               'product_ids'=>implode(",",$products_ids),
            //   'pickup_location'=>'$request->postcode',
               'billing_customer_name'=>$shipping_detail->name,
               'billing_address'=>$shipping_detail->street,
               'billing_address_2'=>$shipping_detail->landmark ?? '',
               'billing_city'=>$shipping_detail->city,
               'billing_pincode'=>$shipping_detail->postcode,
               'billing_state'=>$shipping_detail->state ?? '',
               'billing_email'=>$user->email,
              'billing_country'=>'canada',
               'billing_email'=>$payment['email'],
              
               'payment_method'=>'Paypal',
               
               'payment_status'=>$payment_response->id ? 'paid' : false,
               
               'gst'=>$gst,
               'qty'=>'$qty',
               'weight'=>$shipping_detail->weight,
               'shipping_charges'=>$shipping_charges,
               
               
               'giftwrap_charges'=>'',
               'transaction_charges'=>'',
               'total_discount'=>'',
               'sub_total'=>$sub_total,
               'total'=>$total,
               ]);
               
               
               $update_order_id = Payment::findOrFail($payment_response->id)->update(['order_id'=>$payment_response->id]);
              
              
                     
            /*
            *****************************
            ***** Create Order ITems ****
            *****************************
            */
        
            
            $response = null;
        
            
            foreach( DB::table('carts')->where('user_id',$getdata->id)->get() as $cart_ids){
              
                $cart = Cart::findOrFail($cart_ids->id);
                  
                    $orderitems = new OrderITem;
                    $orderitems->user_id = $cart->user_id;
                    $orderitems->payment_id = $payment_response->id;
                    $orderitems->order_id = $order->id;
                    $orderitems->product_id = $cart->product_id;
                    $orderitems->name = $cart->product_name;
                    $orderitems->total_qty = $cart->qty;
                    $orderitems->total_price = $cart->price;
                    $orderitems->tax = $cart->gst;
                    $response = $orderitems->save();
                    if($response ){
                        $cart->update(['status'=>'ordered']);
                    }
                    Cart::where('id',$cart_ids->id)->delete(); 
                    
                    $product = Product::where('id',$cart->product_id)->first();
                    if($product){
                        $remaining_qty = $product->remaining_qty;
                        $remaining_qty = $remaining_qty - $cart->qty;
                        Product::where('id',$product->id)->update(['remaining_qty'=>$remaining_qty]);
                    }
                   
            }
            
            
            
            
            
             /*
            *****************************
            ***** Submit shipping details for better experience in future ***
            *****************************
            */
            $shipping_detail_id = ShippingDetail::select('id')->where('user_id',$getdata->id)->orderBy('created_at', 'desc')->first();
          $shipping_detail_update = ShippingDetail::where('id',$shipping_detail_id->id)->update(['order_id'=>$order->id]);
           $shipping_detail = ShippingDetail::where('user_id',$getdata->id)->orderBy('created_at', 'desc')->first();

            $address= $shipping_detail->address .',' .$shipping_detail->landmark .',' .$shipping_detail->city .',' .$shipping_detail->state .',' .$shipping_detail->country ;
            $verfication_code = mt_rand(100000,999999);
         
            // $order_details['verfication_code'] = $verfication_code;
            $order_details['billing_name'] = $shipping_detail->name;
            $order_details['order_id'] = $order->product_order_id;
            $order_details['payment_id'] = $order->payment_id;
            $order_details['product'] = implode(",",$product_name);
            $order_details['address'] = $address;
            $order_details['gst'] = $gst;
            $order_details['shipping_charges'] = $shipping_charges;
            $order_details['total'] = $total;
          
            
            Mail::to($shipping_detail->email)->bcc(['jshnvirk11@gmail.com','Info@uniqueproducts.ca'])->send(new OrderRegister($order_details));
         $shipping_detail_delete = ShippingDetail::where('user_id',$getdata->id)->whereNull('order_id')->delete();
            
      return  redirect(route('thank'));

  
} catch (\Exception $ex) {
    return $ex->getMessage();
}


   
}


   

    }
}