<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('qualification_id');
            $table->string('address');
            $table->string('contactno');
            $table->string('deliveryType');
            $table->string('deliveryAddress');
            $table->string('reference_number');
            $table->string('isPrinted')->default(0);
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
        Schema::dropIfExists('request_certificates');
    }
}
