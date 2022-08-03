<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
      use HasFactory;
    protected $fillable =['name','user_id','order_id','country','state','city','address','landmark','postcode','description','phone','email'];
    protected $table='shipping_details';
}
