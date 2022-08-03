<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;

class Order extends Model 
{
    use HasFactory;
    protected $fillable = [
        'product_order_id',
        'user_id',
        'payment_id',
        'product_ids',  
        'pickup_location',
        'billing_customer_name',
        'billing_address',
        'billing_address_2',
        'billing_city',
        'billing_pincode',
        'billing_state',
        'billing_country',
        'billing_email',
        'billing_phone',
        'payment_method',
        'shipping_charges',
        'giftwrap_charges',
        'transaction_charges',
        'total_discount',
        'sub_total',
        'payment_status',
        'gst',
        'qty',
        'weight',
        'total',
        'description',
        'courier_rate',
        'courier_name',
        'courier_company_id',
        ];
        
    public function order_items(){
		return $this->hasMany(OrderItem::class);
	}
	public function productImage($productId){
         
        $product_image_url = Product::where('id',$productId)->first();
         return  $product_image_url;
     }
   public function user() {
        return $this->belongsTo(User::class);
    }
}
