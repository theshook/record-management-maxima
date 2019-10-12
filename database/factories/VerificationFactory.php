<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Verification;
use Faker\Generator as Faker;

$factory->define(Verification::class, function (Faker $faker) {
    return [
        'fullname' => $faker->firstName().' '.$faker->lastName(),
        'email' => $faker->safeEmail(),
        'tracking_number' => $faker->creditCardNumber(),
        'contact' => $faker->e164PhoneNumber(),
        'image' => $faker->imageUrl(640, 480, 'cats') ,
    ];
});
