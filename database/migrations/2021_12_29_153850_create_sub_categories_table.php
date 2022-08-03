<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('additional_info')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(true)->nullable();
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
        Schema::dropIfExists('sub_categories');
    }
}