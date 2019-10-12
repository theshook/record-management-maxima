<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Assessor;
use Faker\Generator as Faker;

$factory->define(Assessor::class, function (Faker $faker) {
    $qualifications_id = \App\Qualification::all()->pluck('id')->toArray();

    return [
        'qualification_id' => $faker->randomElement($qualifications_id),
        'last_name' => $faker->lastName(),
        'first_name' => $faker->firstName(['male', 'female']),
        'middle_name' => $faker->word(),
        'name_extension' => $faker->suffix(),
        'accreditation_number' => $faker->creditCardNumber(),
    ];
});
