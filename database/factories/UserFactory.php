<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        "position" => "director",
        "name_extension" => null,
        "street" => 'null',
        "barangay" => 'null',
        "municipality" => 'null',
        "district" => "I",
        "province" => 'null',
        "region" => "Region I - Ilocos",
        "zipcode" => 'null',
        "sex" => "Male",
        "civil_status" => "Single",
        "tel" => null,
        "mobile" => '09565827400',
        "birthdate" => '1992-08-08',
        "guardian" => 'null',
        "occupation" => 'null',
        "address" => 'null',
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'middle_name' => $faker->firstNameFemale,
        'email' => "admin@example.com",
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
