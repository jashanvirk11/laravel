<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\PickupLocation;


class ApiController extends Controller
{
   public static function pushOrder($id)
   {
     
     $getdata = OrderItem::pushOrder($id); 
     
     return back();
//      return response()->json(['status'=>$getdata]);
   }
   
    public static function updatePickupOrder($id)
   { 
     $get_update_data = OrderItem::updatePickupOrder($id); 
    
     
     return back();

   }
   
   
   public static function getShiprocketAuthenticationKey() {
     	    $curl= curl_init();
            $url ="https://apiv2.shiprocket.in/v1/external/auth/login";
            
            // set our url with curl_setopt()
            curl_setopt($curl, CURLOPT_URL,$url);
            
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,"email=jashan@allheartweb.com&password=api12345@@");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $server_output = curl_exec($curl);
         
            curl_close($curl);
            $server_output = json_decode($server_output,true);
            return $server_output;
     	}
     	
    public static function getAllPickupLocation()
   { 
      $server_output = ApiController::getShiprocketAuthenticationKey();
    
         $url ="https://apiv2.shiprocket.in/v1/external/settings/company/pickup";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array('Content-Type:application/json','Access-Control-Allow-Origin:*','Authorization:Bearer '.$server_output['token'].''));
        $output = curl_exec($curl);
        curl_close($curl);
        $output = json_decode($output,true);
        // dd($output['data']['shipping_address']);
        // dd($output);
   
        
        if(count($output['data']['shipping_address']) > 0){
            foreach($output['data']['shipping_address'] as $key => $items)
            {
               
              if(!PickupLocation::where('pickup_location_id',$output['data']['shipping_address'][$key]['id'])->first()){  
                $data = new PickupLocation();
               $data->pickup_location_id = $output['data']['shipping_address'][$key]['id'];
               $data->pickup_location = $output['data']['shipping_address'][$key]['pickup_location'];
               $data->name = $output['data']['shipping_address'][$key]['name'];   
              $data->email = $output['data']['shipping_address'][$key]['email']; 
              $data->city = $output['data']['shipping_address'][$key]['city']; 
               $data->state = $output['data']['shipping_address'][$key]['state']; 
               $data->phone = $output['data']['shipping_address'][$key]['phone']; 
               $data->address = $output['data']['shipping_address'][$key]['address']; 
              $data->country = $output['data']['shipping_address'][$key]['country']; 
              $data->pin_code = $output['data']['shipping_address'][$key]['pin_code']; 
              
                  $data->save();
              }
            }
        }
          return back()->with('success','Location updated');
   }
//add Pickup LOCATION   
       public static function addPickupLocation($request)
   { 
       $data = new PickupLocation();
       $data->pickup_location = $request->name;
        $data->name = $request->name ;
        $data->email =  $request->email ;
        $data->phone =   $request->phone ;
        $data->address =  $request->address  ;
        $data->city =  $request->city ; 
        $data->state =  $request->state ;
        $data->country =  $request->country ;
        $data->pin_code =  $request->pin_code  ;
        $orderdetails = json_encode($data);
      $server_output = ApiController::getShiprocketAuthenticationKey();
      
         $url ="https://apiv2.shiprocket.in/v1/external/settings/company/addpickup";
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
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
//   public static function getLogisticPrice($weight,$postcode){
//       if($weight <= '0'){
//           $weight = 1000;
//       }else{
//           $weight = $weight;
//       }
       
//       $server_output = ApiController::getShiprocketAuthenticationKey();
//       $postcode = (int)$postcode;
//       $weight = $weight/1000;
       
//         $orderdetails['pickup_postcode'] = 305801;
//         $orderdetails['delivery_postcode'] = $postcode;
//         $orderdetails['weight'] = $weight;
//         $orderdetails['cod'] = 0;
        
//          $orderdetails = json_encode($orderdetails);
//         $url ="https://apiv2.shiprocket.in/v1/external/courier/serviceability";
//         $curl = curl_init();
//         curl_setopt($curl, CURLOPT_URL,$url);
//         curl_setopt($curl, CURLOPT_POST, 1);
//         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
//          curl_setopt($curl, CURLOPT_POSTFIELDS,$orderdetails);
//         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//         curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
//         curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
//         curl_setopt($curl, CURLOPT_HTTPHEADER,array('Content-Type:application/json','Access-Control-Allow-Origin:*','Authorization:Bearer '.$server_output['token'].''));
//         $output = curl_exec($curl);
//         curl_close($curl);
//         $output = json_decode($output,true);
        
//       $courier_details= [];
      
//         if($output['status'] == '200'){
           
//             foreach($output['data']['available_courier_companies'] as $key => $courier){
               
//                 if($key == '0'){
//                      $courier_details['rate'] = $courier['rate'];
//                     $courier_details['courier_name'] = $courier['courier_name'];
//                     $courier_details['courier_company_id'] = $courier['courier_company_id'];
//                 }
                 
//                 if($courier['rate'] < $courier_details['rate']){
                   
//                     $courier_details['rate'] = $courier['rate'];
//                     $courier_details['courier_name'] = $courier['courier_name'];
//                     $courier_details['courier_company_id'] = $courier['courier_company_id'];
//                 }
//             }
//             $courier_details['status'] = true;
           
//             return $courier_details;
//         }else{
//             $courier_details['status'] = false;
//             $courier_details['message'] = $output['message'];
           
//             return $courier_details;
//         }
    //   $courier_details['total_weight']= $weight;
            // dd($output['data']['available_courier_companies']);
       
//   }
   
// }

