<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('name_extension')->nullable();
            $table->string('street');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('district');
            $table->string('province');
            $table->string('region');
            $table->string('zipcode');
            $table->string('tel')->nullable();
            $table->string('mobile');
            $table->date('birthdate');
            $table->string('guardian');
            $table->string('occupation');
            $table->string('address');
            $table->string('sex');
            $table->string('civil_status');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
