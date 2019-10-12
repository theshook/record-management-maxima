<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Applicant;
use Faker\Generator as Faker;

$factory->define(Applicant::class, function (Faker $faker) {
    $qualifications_id = \App\Qualification::all()->pluck('id')->toArray();
    $app = new Applicant();
    return [
        'training_center' => $faker->sentence(3),
        'school_address' => $faker->address(),
        'qualification_id' => $faker->randomElement($qualifications_id),
        'assessment_type' => $faker->randomElement(["FULL QUALIFICATION", "COC", "RENEWAL"]),
        'client_type' => $faker->randomElement(["TVET Graduate Student", "TVET Graduate", "Industry Worker", "K-12", "OFW"]),
        'first_name' => $faker->firstName(['male', 'female']),
        'last_name' => $faker->lastName(),
        'middle_name' => $faker->word(),
        'name_extension' => $faker->suffix(),

        'street' => $faker->streetName(),
        'barangay' => $faker->streetSuffix(),
        'district' => $faker->state(),
        'city' => $faker->city(),
        'province' => $faker->cityPrefix(),
        'region' => $faker->biasedNumberBetween(1, 10),
        'zipcode' => $faker->postcode(),

        'mother_name' => $faker->name('female'),
        'father_name' => $faker->name('male'),

        'sex' => $faker->randomElement(['Male', 'Female']),
        'civil_status' => $faker->randomElement(['Single', 'Married', 'Widow', 'Separated']),

        'email' => $faker->safeEmail(),

        'hea' => $faker->randomElement(['Elementary Graduate', 'High School Graduate', 'TVET Graduate', 'College Level', 'College Graduate']),
        'es' => $faker->randomElement(['Casual', 'Job Order', 'Probationary', 'Permanent', 'Self-Employed', 'OFW']),

        'birthdate' => $faker->date(),
        'birthplace' => $faker->state(),
        'age' => $faker->biasedNumberBetween(14, 30),

        'ref_no' => $app->generateReferenceNumber()
    ];
});
