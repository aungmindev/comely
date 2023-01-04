<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeleImportModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cele_import_models', function (Blueprint $table) {
            $table->id();
            $table->integer('year')->index();
            $table->integer('rank')->index();
            $table->string('recipient');
            $table->string('country')->index();
            $table->string('career');
            $table->integer('tied');
            $table->string('title');
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
        Schema::dropIfExists('cele_import_models');
    }
}
