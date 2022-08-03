<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('sub_category_id')->nullable();
            $table->string('product_image_id')->nullable();
            $table->string('name')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('gallery')->nullable();
            $table->text('description')->nullable();
            $table->string('product_keyword')->nullable();
            $table->string('price')->nullable();
            $table->string('offer_price')->nullable();
            $table->string('dealer_price')->nullable();
            $table->string('weight')->nullable();
            $table->string('gst')->nullable();
            $table->string('qty')->nullable();
            $table->string('total_qty')->nullable();
            $table->string('slug')->nullable();
            $table->text('additonal_info')->nullable();
            
            $table->enum('status',['active','OutOfStock','waiting'])->default('active')->nullable();
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
        Schema::dropIfExists('products');
    }
}
