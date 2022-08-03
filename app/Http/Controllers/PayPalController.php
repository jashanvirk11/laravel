<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
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

class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('transaction');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    { 
   if(Session::has('user_session'))
        {
             $getdata = $request->session()->get('user_session');
          
           foreach( DB::table('carts')->where('user_id',$getdata->id)->get() as $cart_ids){
                 
                $products_ids[] = $cart_ids->product_id;
                $product_name[]= $cart_ids->product_name;
               
             }
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
     
     $shipping_charges= $sub_total >=75 ? 0 : 3.99;
     $total = $sub_total+$gst+$shipping_charges;
    // $total = number_format($total,4);
    // $total = (int)$total;
  $total =  number_format((float)$total, 2, '.', '');
  
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "CAD",
                        // "value" =>  number_format($total)*100,
                         "value" => $total,
                          "description" => implode(",",$product_name)
                    ]
                ]
            ]
        ]);
      
        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
             
                if ($links['rel'] == 'approve') {
                    
         
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');

        } else {
           
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
        }    
}

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
     
      
        $provider = new PayPalClient;
      
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        foreach( $response['purchase_units'] as $purchase_units )
        {
              foreach( $purchase_units['payments'] as $payment)
              {
               $payment = $payment[0];
              }
        }
   
       
      
     $getdata = $request->session()->get('user_session');
     
          foreach( DB::table('carts')->where('user_id',$getdata->id)->get() as $cart_ids){
                 
                $products_ids[] = $cart_ids->product_id;
                $product_name[]= $cart_ids->product_name. $cart_ids->product_name;
               
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
     
     $shipping_charges= $sub_total >=75 ? 0 : 3.99;
     $total = $sub_total+$gst+$shipping_charges;
    $total = number_format($total,3);
     
        
    /*
            ***************************************************************
            ***** Store Transaction Details in table ********
            **************************************************************
            */
        
            $payment_response = Payment::create([
                'user_id'=>Session::get('user_session')->id,
                'transaction_id'=>$payment['id'],
                'method'=>'Paypal',
                'amount'=>$total,
                'status'=>$payment['status'],
                'isCaptured'=>'1',
                'description'=>'',
                'wallet'=>' ',
                'vpa'=>'',
                'fee'=>'',
                'tax'=>'',
                'error_code'=>'',
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
                /*
            *****************************
            ***** Create Order ITems ****
            *****************************
            */
        
            $user = User::findOrFail(Session::get('user_session')->id);
            
             $shipping_detail = ShippingDetail::where('user_id',Session::get('user_session')->id)->orderBy('user_id','desc')->first();
   $order = Order::create([
               'product_order_id'=>'1313-'.rand(100000,999999),
               'user_id'=>Session::get('user_session')->id,
               'payment_id'=>$payment_response->id,
               'product_ids'=>implode(",",$products_ids),
            //   'pickup_location'=>'$request->postcode',
               'billing_customer_name'=>$shipping_detail['name'],
               'billing_address'=>$shipping_detail['street'],
               'billing_address_2'=>$shipping_detail['landmark'],
               'billing_city'=>$shipping_detail['city'],
               'billing_pincode'=>$shipping_detail['postcode'],
               'billing_state'=>$shipping_detail['state'],
               'billing_email'=>$shipping_detail['email'],
              'billing_country'=>$shipping_detail['country'],
               'billing_email'=>$shipping_detail['email'],
               'billing_phone'=>$shipping_detail['phone'],
               'payment_method'=>'Paypal',
               
               'payment_status'=>$payment_response->id ? 'COMPLETED' : false,
               
               'gst'=>$gst,
               'qty'=>$request->qty,
               'weight'=>$request->weight,
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
            ***** Create Cart ITems ****
            *****************************
            */
        
            $cart_response = null;
        
            
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
                    $cart_response = $orderitems->save();
                    if($cart_response ){
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
            
        $shipping_detail_id = ShippingDetail::select('id')->where('user_id',$getdata->id)->orderBy('created_at', 'desc')->first();
          $shipping_detail_update = ShippingDetail::where('id',$shipping_detail_id->id)->update(['order_id'=>$order->id]);
           $shipping_detail = ShippingDetail::where('user_id',$getdata->id)->orderBy('created_at', 'desc')->first();

            $address= $shipping_detail->address .',' .$shipping_detail->city .',' .$shipping_detail->state .',' .$shipping_detail->country ;
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
            $order_details['description'] = $shipping_detail->description;
          
            
            Mail::to($shipping_detail->email)->bcc(['jshnvirk11@gmail.com','Info@uniqueproducts.com'])->send(new OrderRegister($order_details));
            $shipping_detail_delete = ShippingDetail::where('user_id',$getdata->id)->whereNull('order_id')->delete();
  
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('thank')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
      
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}