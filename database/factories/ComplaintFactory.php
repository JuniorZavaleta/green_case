<?php

/**
 * Function that create faker complaints but needs the next states
 */
$factory->define(App\Models\Complaint::class, function (Faker\Generator $faker, $factory) {
    $citizen = factory(App\Models\Citizen::class)->create();

    return [
        'citizen_id' => $citizen->id,
        'authority_id' => $faker->numberBetween(2, 44),
        'type_contamination_id' => $faker->numberBetween(1, 6),
        'latitude' => 12.234,
        'longitude' => 21.234,
        'commentary' => 'test comment',
        'complaint_status_id' => $faker->numberBetween(1, 6),
        'type_communication_id' => $faker->numberBetween(1, 3),
    ];
});

/**
 * Add the state from messenger to a faker complaint
 */
$factory->state(App\Models\Complaint::class, 'messenger', function () {
    return [
        'type_communication_id' => App\Models\Channel::MESSENGER,
    ];
});

/**
 * Add the state from telegram to a faker complaint
 */
$factory->state(App\Models\Complaint::class, 'telegram', function () {
    return [
        'type_communication_id' => App\Models\Channel::TELEGRAM,
    ];
});

/**
 * Add the state from messenger to a faker complaint
 */
$factory->state(App\Models\Complaint::class, 'facebook', function () {
    return [
        'type_communication_id' => App\Models\Channel::FACEBOOK,
    ];
});

/**
 * Add the state of completed to a faker complaint
 */
$factory->state(App\Models\Complaint::class, 'incompleted', function() {
    return [
        'complaint_status_id' => App\Models\Complaint::INCOMPLETED,
    ];
});

/**
 * Add the state of completed to a faker complaint
 */
$factory->state(App\Models\Complaint::class, 'completed', function() {
    return [
        'complaint_status_id' => App\Models\Complaint::COMPLETED,
    ];
});
