<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
           $table->id();
            $table->string('user_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('name')->nullable();
            $table->string('sku')->nullable();
            $table->string('units')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('discount')->nullable();
            $table->string('tax')->nullable();
            $table->string('total_qty')->nullable();
            $table->string('total_price')->nullable();
          
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
        Schema::dropIfExists('order_items');
    }
}
