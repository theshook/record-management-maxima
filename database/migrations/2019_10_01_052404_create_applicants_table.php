<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('training_center');
            $table->string('school_address');
            $table->unsignedInteger('qualification_id');
            $table->string('assessment_type');
            $table->string('client_type');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('name_extension')->nullable();

            $table->string('street')->nullable();
            $table->string('barangay');
            $table->string('district')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('region');
            $table->string('zipcode');

            $table->string('mother_name');
            $table->string('father_name');

            $table->string('sex');
            $table->string('civil_status');

            $table->string('tel')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->string('fax')->nullable();
            $table->string('others')->nullable();

            $table->string('hea');
            $table->string('es');


            $table->date('birthdate');
            $table->string('birthplace');
            $table->integer('age');

            $table->string('ref_no');

            $table->integer('scheduled')->default(0);
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
        Schema::dropIfExists('applicants');
    }
}
