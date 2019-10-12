<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('qualification_id');
            $table->string('client_type');
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('name_extension')->nullable();
            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('municipality')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('sex')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('tel')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('age')->nullable();
            $table->string('weight')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('eyecolor')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('haircolor')->nullable();
            $table->string('religion')->nullable();
            $table->string('bloodtype')->nullable();
            $table->string('disability')->nullable();
            $table->string('sssno')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('gsisno')->nullable();
            $table->string('height')->nullable();
            $table->string('tinno')->nullable();
            $table->string('elemschool')->nullable();
            $table->string('elemadd')->nullable();
            $table->string('highschool')->nullable();
            $table->string('highadd')->nullable();
            $table->string('college')->nullable();
            $table->string('collegeadd')->nullable();
            $table->string('vocational')->nullable();
            $table->string('vocadd')->nullable();
            $table->string('father')->nullable();
            $table->string('occupation')->nullable();
            $table->string('mother')->nullable();
            $table->string('moccupation')->nullable();
            $table->string('guardian')->nullable();
            $table->string('coccupation')->nullable();
            $table->string('address')->nullable();
            $table->string('le_amount1')->nullable();
            $table->string('le_datepayment1')->nullable();
            $table->string('le_orno1')->nullable();
            $table->string('le_amount2')->nullable();
            $table->string('le_datepayment2')->nullable();
            $table->string('le_orno2')->nullable();
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
        Schema::dropIfExists('students');
    }
}
