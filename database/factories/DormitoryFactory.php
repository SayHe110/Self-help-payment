<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Dormitory::class, function (Faker $faker) {
    return [
        'dorm_number' => random_int(100, 900),
    ];
});
