<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Session;
use App\Http\Controllers\api\ApiController;

class OrderItem extends Model
{
    use HasFactory;
    
    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
    
    public function order_items(){ 
		return $this->hasMany('App\Models\Order','order_id');
	}
	
    	
	
	public static function pushOrder($order_id)
     {
         $userDetail = Order::findOrFail($order_id);
        //   dd($userDetail->user->state);

        $orderdetails = Order::with('order_items')->where('id',$order_id)->first()->toArray();
        
        $update_state = Order::where('id',$order_id)->update([
             'billing_state' => $userDetail->user->state,
             ]);
      
      
        $orderdetails['order_id'] = $orderdetails['product_order_id'];
        $orderdetails['order_date'] = $orderdetails['created_at'];
        
        $orderdetails['pickup_location'] = "rakesh";
        
        $orderdetails['channel_id'] = "1010891";
        $orderdetails['comment'] = "testfield";
        $orderdetails['billing_customer_name'] = $orderdetails['billing_customer_name'];
        $orderdetails['billing_last_name'] = "  ";
        $orderdetails['billing_address'] = $orderdetails['billing_address'];
        $orderdetails['billing_address_2'] = $orderdetails['billing_address_2'];
        $orderdetails['billing_city'] = $orderdetails['billing_city'];
        $orderdetails['billing_pincode'] = $orderdetails['billing_pincode'];
        $orderdetails['billing_state'] =$orderdetails['billing_state'];
        $orderdetails['billing_country'] = $orderdetails['billing_country'];
        $orderdetails['billing_email'] = $orderdetails['billing_email'];
    
        $orderdetails['billing_phone'] = str_replace("+91","", $orderdetails['billing_phone']);
       
        $orderdetails['shipping_is_billing'] = true;
       
        
        foreach($orderdetails['order_items'] as $key=> $items)
        {
            $orderdetails['order_items'][$key]['name'] = $items['name']; 
            $orderdetails['order_items'][$key]['sku'] =  $items['id']; 
            $orderdetails['order_items'][$key]['units'] = 10; 
            $orderdetails['order_items'][$key]['selling_price'] = $items['selling_price']; 
            $orderdetails['order_items'][$key]['discount'] = $items['discount']; 
            $orderdetails['order_items'][$key]['tax'] = $items['tax'];
            
        }
        
        
            // $orderdetails['shipping_is_billing'] = true;
            $orderdetails['payment_method']= $orderdetails['payment_method'];
         
            if($orderdetails['shipping_charges'] ||  $orderdetails['giftwrap_charges'] ||  $orderdetails['transaction_charges'] == null)
            {
            $orderdetails['shipping_charges']= $orderdetails['shipping_charges'];
            $orderdetails['giftwrap_charges']= $orderdetails['giftwrap_charges'];
            $orderdetails['transaction_charges']= $orderdetails['transaction_charges'];
            }
            else
            {
            $orderdetails['shipping_charges']= 0;
            $orderdetails['giftwrap_charges']= 0;
            $orderdetails['transaction_charges']= 0;
            }
            $orderdetails['total_discount']= $orderdetails['total_discount'];
            $orderdetails['sub_total']= $orderdetails['sub_total'];
            $orderdetails['length']= 10;
            $orderdetails['breadth']=10;
            $orderdetails['height']= 10;
            $orderdetails['weight']= 10;
             
           $orderdetails = json_encode($orderdetails);
   
        //   generate Access Token
        $server_output = ApiController::getShiprocketAuthenticationKey(); 
        
        //  Create Orde IN shipment
            $url ="https://apiv2.shiprocket.in/v1/external/orders/create/adhoc";
            $curl= curl_init();

            curl_setopt($curl, CURLOPT_URL,$url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$orderdetails);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_HTTPHEADER,array('Content-Type:application/json','Access-Control-Allow-Origin:*','Authorization:Bearer '.$server_output['token'].''));
            $output = curl_exec($curl);
            curl_close($curl);
            $output = json_decode($output,true);
            // dd($output);
    //   update order in shipment
            $Update_order = Order::where('id',$order_id)->update([
               'shiprocket_order_id' => $output['order_id'],
               'shiprocket_shipment_id' => $output['shipment_id'],
               'shiprocket_status' =>  $output['status'],
               'shiprocket_status_code' => 1,
               'shiprocket_onboarding_completed_now' =>  $output['onboarding_completed_now'],
               'shiprocket_awb_code' => $output['awb_code'],
               'shiprocket_courier_company_id' =>  $output['courier_company_id'],
               'shiprocket_courier_name' =>  $output['courier_name']
           ]);
           
           if($Update_order){
            $status = "true";
            $message = "Order Successfully Pushed to ShipRocket";
           }
           else
           {
               $status = "false";
              $message = "Order not  Pushed to ShipRocket. Please Contact Admin";
           }
         Session::flash('status',$status);
         Session::flash('message',$message);
        //  array(['status'=>$status,'message'=>$message])
        // dd(Session::all());
        return $Update_order;
     }
     
     
     

     	public static function updatePickupOrder($order_id)
     	{

            $server_output = ApiController::getShiprocketAuthenticationKey();
            
            $orderdetails['order_id']= array((int)$order_id);
            $orderdetails['pickup_location']="rakesh";
            $orderdetails = json_encode($orderdetails);
            
            $url ="https://apiv2.shiprocket.in/v1/external/orders/address/pickup";
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,$url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
            curl_setopt($curl, CURLOPT_POSTFIELDS,$orderdetails);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_HTTPHEADER,array('Content-Type:application/json','Access-Control-Allow-Origin:*','Authorization:Bearer '.$server_output['token'].''));
            $output = curl_exec($curl);
            curl_close($curl);
            $output = json_decode($output,true);
  
     	}
     
   
 

}
