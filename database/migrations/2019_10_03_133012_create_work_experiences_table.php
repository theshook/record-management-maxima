<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('we_nof')->nullable();
            $table->string('we_pos')->nullable();
            $table->date('we_from')->nullable();
            $table->date('we_to')->nullable();
            $table->integer('we_month')->nullable();
            $table->string('we_soap')->nullable();
            $table->integer('we_noye')->nullable();
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
        Schema::dropIfExists('work_experiences');
    }
}
