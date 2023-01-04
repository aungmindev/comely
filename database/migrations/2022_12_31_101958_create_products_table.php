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
            $table->string('item_code')->index();
            $table->string('name')->index();
            $table->string('name_en')->index();
            $table->integer('brand_id')->index();
            $table->integer('category_id')->index();
            $table->string('colors');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->integer('stock');
            $table->integer('regular_price');
            $table->integer('original_sale_price')->index();
            $table->integer('after_discount_price')->index();
            $table->integer('discount_percent');
            $table->text('description')->nullable();
            $table->text('description_en')->nullable();
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
