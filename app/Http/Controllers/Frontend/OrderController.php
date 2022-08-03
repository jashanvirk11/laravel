<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Cart;
use App\Models\ShippingDetail;
use Session;


class OrderController extends Controller
{
    public function orderValidation(Request $request){
        
        /*
        *************************************
        ***** Billing Detail Validation *****
        *************************************
       */
        $request->validate([
            'name'=>'required',
            'street'=>'required',
            'landmark'=>'required',
            'city'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'postcode'=>'required',
        ]);
        
       return response()->json(['data'=>'validation success'],200);
    }
}


