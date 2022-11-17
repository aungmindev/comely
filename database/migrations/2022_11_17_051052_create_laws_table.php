<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laws', function (Blueprint $table) {
            $table->id();
            $table->string('law_type')->index();
            $table->integer('parliament_times_id')->index();
            $table->string('session_time')->index()->nullable();
            $table->string('session_time_en')->index()->nullable();
            $table->string('law_name');
            $table->string('law_name_en');
            $table->date('dop')->index();
            $table->string('proposed_from');
            $table->string('proposed_from_en');
            $table->date('dopd')->index();
            $table->date('doprd')->index();
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
        Schema::dropIfExists('laws');
    }
}
