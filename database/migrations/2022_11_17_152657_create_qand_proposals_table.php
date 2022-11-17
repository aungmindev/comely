<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQandProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qand_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('qnadp_type')->index();
            $table->integer('isstar')->index();
            $table->integer('parliament_times_id')->index();
            $table->string('session_time')->index()->nullable();
            $table->string('session_time_en')->index()->nullable();
            $table->string('title');
            $table->string('title_en');
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
        Schema::dropIfExists('qand_proposals');
    }
}
