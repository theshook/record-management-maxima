<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetencyAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competency_assessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ca_title')->nullable();
            $table->string('ca_ql')->nullable();
            $table->string('ca_is')->nullable();
            $table->string('ca_cn')->nullable();
            $table->date('ca_di')->nullable();
            $table->date('ca_ed')->nullable();
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
        Schema::dropIfExists('competency_assessments');
    }
}
