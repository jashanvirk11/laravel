<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('method')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->string('bank')->nullable();
            $table->boolean('isCaptured')->nullable();
            $table->boolean('amount_refunded')->nullable();
            $table->string('refund_status')->nullable();
            $table->string('description')->nullable();
            $table->string('wallet')->nullable();
            $table->string('vpa')->nullable();
            $table->string('fee')->nullable();
            $table->string('tax')->nullable();
            
            $table->string('error_code')->nullable();
      
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
        Schema::dropIfExists('payments');
    }
}
