<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psessions', function (Blueprint $table) {
            $table->id();
            $table->string('sessiontype_id')->index();
            $table->string('session_data_type')->index();
            $table->integer('parliament_times_id')->index();
            $table->string('session_time_id')->index();
            $table->string('title');
            $table->string('title_en');
            $table->string('date')->index();
            $table->text('summary')->nullable();
            $table->text('summary_en')->nullable();
            $table->string('pdf');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('psessions');
    }
}
