<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('product_order_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('product_ids')->nullable();

            $table->string('pickup_location')->nullable();
            $table->string('billing_customer_name')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_address_2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_pincode')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('shipping_charges')->nullable();
            $table->string('giftwrap_charges')->nullable();
            $table->string('transaction_charges')->nullable();
            $table->string('total_discount')->nullable();
            $table->string('weight')->nullable();
            $table->string('qty')->nullable();
            $table->string('gst')->nullable();
            $table->string('payment_status')->nullable()->default(false);
            $table->enum('status',['Inprogress','Canceled','Delivered',''])->nullable()->default('Inprogress');
            
            $table->string('sub_total')->nullable();
            $table->string('total')->nullable();
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
