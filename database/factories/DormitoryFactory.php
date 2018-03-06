<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Dormitory::class, function (Faker $faker) {

    $time = $faker -> dateTimeThisMonth();
    return [
        'dorm_number' => random_int(100, 900),
        'created_at' => $time,
        'updated_at' => $time,
    ];
});
