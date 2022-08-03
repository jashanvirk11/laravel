<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','order_id','transaction_id','method','amount','status','bank','isCaptured','amount_refunded','refund_status','description','wallet',
    'free','tax','error_code',];
}
