<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Complaint::class, function(Faker\Generator $faker) {

   return [
        'citizen_id'            => $faker->randomNumber(10),
        'authority_id'          => $faker->randomNumber(10),
        'type_contamination_id' => $faker->randomNumber(10),
        'type_communication_id' => $faker->randomNumber(10),
        'complaint_state_id'    => $faker->randomNumber(10),
        'latitude'              => $faker->randomFloat(5),
        'longitude'             => $faker->randomFloat(5),
        'commentary'            => $faker->sentence(6)
   ];
});
