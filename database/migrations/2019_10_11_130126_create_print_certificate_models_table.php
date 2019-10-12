<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintCertificateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_certificate_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('qualification_id');
            $table->string('code_no');
            $table->string('core_competencies');
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
        Schema::dropIfExists('print_certificate_models');
    }
}
