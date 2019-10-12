<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_seminars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('otsa_title')->nullable();
            $table->string('otsa_venue')->nullable();
            $table->date('otsa_from')->nullable();
            $table->date('otsa_to')->nullable();
            $table->integer('otsa_hours')->nullable();
            $table->string('otsa_conducted')->nullable();
            $table->integer('applicant_id');
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
        Schema::dropIfExists('training_seminars');
    }
}
