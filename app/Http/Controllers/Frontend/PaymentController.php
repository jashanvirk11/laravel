<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

class PaymentController extends Controller
{

  
    public function store(Request $request)
    {
         if($request->method() == 'GET') 
        {
           
        return view('Payment.payment');
        }
        else
        {
        
        $cart_ids = array_filter(explode(":",$request->cart));
        $product_ids = array_filter(explode(":",$request->product));
       
        
        $input = $request->all();
      
        // $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        // $api = new Api('rzp_test_wPQ4XoqMtxocRb', 'EpZhw3lErtEPRdL40kBIBOTR');
        $api = new Api('rzp_live_o9d0VAR1saVXvl', 'Skn3lgo91WTDLb4cfyUSJUsY');
  
        $payment = $api->payment->fetch($request->payment_id);
      
        if(count($input)  && !empty($input['payment_id'])) {
            try {
                
                $response = $api->payment->fetch($request->payment_id)->capture(array('amount'=>$payment['amount'])); 
                
                
            /*
            ***************************************************************
            ***** Store Transaction Details in table ********
            **************************************************************
            */
        
            $payment_response = Payment::create([
                'user_id'=>Session::get('user_session')->id,
                'transaction_id'=>$payment['id'],
                'method'=>$payment['method'],
                'amount'=>$payment['amount'] / 100,
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
            
           $invoice = Order::orderBy('id', 'desc')->first();
            $year_month = date('Y/m/d/');
      
            if($invoice){
                $last_invoice = explode("/",$invoice->product_order_id);
                $invoice = $invoice->product_order_id;
                // $invoice = str_replace($year_month,"",$invoice);
                $invoice = $last_invoice[array_key_last($last_invoice)] + 1;
                 
                $invoice =date('Y/m/d').'/'.$invoice;
                
            }else{
                $invoice = date('Y/m/d/').'1';
            }
            
            $user = User::findOrFail(Session::get('user_session')->id);
            $order = Order::create([
               'product_order_id'=>$invoice,
               'user_id'=>Session::get('user_session')->id,
               'payment_id'=>$payment_response->id,
               'product_ids'=> implode(':',$product_ids),
               'pickup_location'=>'$request->postcode',
               'billing_customer_name'=>$request->name,
               'billing_address'=>$request->street,
               'billing_address_2'=>$request->landmark ?? '',
               'billing_city'=>$request->city,
               'billing_pincode'=>$request->postcode,
               'billing_state'=>$request->state ?? '',
               'billing_country'=>'India',
               'billing_email'=>$user->email,
             
               'billing_phone'=>$user->phone,
               'payment_method'=>$payment['method'],
               
               'payment_status'=>$payment_response->id ? 'paid' : false,
               
               'gst'=>$request->gst,
               'qty'=>$request->qty,
               'weight'=>$request->weight,
               'shipping_charges'=>$request->shipping_charges,
               
               'courier_rate'=>$request->courier_rate,
               'courier_name'=>$request->courier_name,
               'courier_company_id'=>$request->courier_company_id,
               
               
               'giftwrap_charges'=>'',
               'transaction_charges'=>'',
               'total_discount'=>'',
               'sub_total'=>$request->sub_total,
               'total'=>$request->total,
              
               ]);
               
               
               $update_order_id = Payment::findOrFail($payment_response->id)->update(['order_id'=>$order->id]);

                
            /*
            *****************************
            ***** Create Order ITems ****
            *****************************
            */
        
            
            $response = null;
            foreach($cart_ids as $cart_ids){
                $cart = Cart::findOrFail($cart_ids);
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
                    Cart::where('id',$cart_ids)->delete(); 
                    
                    $product = Product::where('id',$cart->product_id)->first();
                    if($product){
                        $remaining_qty = $product->remaining_qty;
                        $remaining_qty = $remaining_qty - $cart->qty;
                        Product::where('id',$product->id)->update(['remaining_qty'=>$remaining_qty]);
                    }
                   
            }
            
            $wishlist_response = null;
            foreach($product_ids as $product_ids){
               
                 Wlist::where('product_id',$product_ids)->delete();   
            }
            
            
            /*
            *****************************
            ***** Submit shipping details for better experience in future ***
            *****************************
            */
            
             $shipping_detail = ShippingDetail::create([
                'name'=>$request->name,
                'user_id'=>Session::get('user_session')->id,
                'order_id'=>$order->id,
                'country'=>'india',
                'state'=>$request->state,
                'city'=>$request->city,
                'postcode'=>$request->postcode,
                'address'=>$request->street,
                'landmark'=>$request->landmark,
                'email'=>$payment['email'],
                'phone'=>$payment['contact'],
            ]);
            
            $address= $shipping_detail->address .',' .$shipping_detail->landmark .',' .$shipping_detail->city .',' .$shipping_detail->country ?? 'india';
            $verfication_code = mt_rand(100000,999999); 
            // $order_details['verfication_code'] = $verfication_code;
            $order_details['billing_name'] = $shipping_detail->name;
            $order_details['invoice'] = $order->product_order_id;
            $order_details['order_id'] = $order->id;
            $order_details['payment_id'] = $order->payment_id;
            $order_details['product'] = 'product name';
            $order_details['address'] = $address;
            $order_details['gst'] = $order->gst;
            $order_details['shipping_charges'] = '';
            $order_details['total'] = $order->total;
            
            
            Mail::to($user->email)->bcc('jshnvirk@gmail.com')->send(new OrderRegister($order_details));
            
            
          
            } catch (Exception $e) {
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
       
        return redirect()->back();
        }
    }
    
    public function thankyou() {
        return view('pages.thankyou');
    }
}


