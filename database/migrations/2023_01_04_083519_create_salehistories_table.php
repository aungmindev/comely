<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalehistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salehistories', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->index();
            $table->string('item_code')->index();
            $table->string('product_name')->index();
            $table->integer('price')->index();
            $table->string('brand')->index();
            $table->string('category')->index();
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
        Schema::dropIfExists('salehistories');
    }
}
