<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensureExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licensure_exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('le_title')->nullable();
            $table->integer('le_year')->nullable();
            $table->date('le_date')->nullable();
            $table->integer('le_rating')->nullable();
            $table->string('le_remarks')->nullable();
            $table->date('le_expiry')->nullable();
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
        Schema::dropIfExists('licensure_exams');
    }
}
