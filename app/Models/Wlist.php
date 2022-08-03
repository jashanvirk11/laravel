<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wlist extends Model
{
    use HasFactory;
    
   protected $fillable = ['user_id','product_id','product_name','image','price','qty','weight','gst','status',];
    protected $table ='wlist';
    
}
