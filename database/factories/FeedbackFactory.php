<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Feedback;
use Faker\Generator as Faker;

$factory->define(Feedback::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name(),
        'email' => $faker->safeEmail(),
        'message' => $faker->paragraph(2)
    ];
});
