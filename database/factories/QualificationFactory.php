<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Qualification;
use Faker\Generator as Faker;

$factory->define(Qualification::class, function (Faker $faker) {
    return [
        'sector' => $faker->sentence(3),
        'course' => $faker->sentence(4),
        'accreditation' => $faker->creditCardNumber(),
        'description' => $faker->paragraph(5)
    ];
});
