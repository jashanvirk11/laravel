<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('temp_carts', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('qty')->nullable();
            $table->string('weight')->nullable();
            $table->string('gst')->nullable();
            $table->enum('status',['temp','cart'])->default('temp')->nullable();
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
        Schema::dropIfExists('temp_carts');
    }
}
