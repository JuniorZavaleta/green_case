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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        'state' => 1,
    ];
});

$factory->state(App\Models\User::class, 'admin', function () {
    return [
        'type_user' => 1,
    ];
});

$factory->state(App\Models\User::class, 'authority', function () {
    return [
        'type_user' => 2,
    ];
});

$factory->define(App\Models\District::class, function () {
    return [
        'name' => 'fake district',
    ];
});

$factory->define(App\Models\Authority::class, function ($factory) {
    return [
        'id' => factory(App\Models\User::class)->states('authority')->create()->id,
        'name' => 'test',
        'district_id' => factory(App\Models\District::class)->create()->id,
    ];
});

/**
 * Function that create faker citizens
 */
$factory->define(App\Models\Citizen::class, function (Faker\Generator $faker) {
    return [
        'name' => substr($faker->name, 0, 15),
    ];
});
