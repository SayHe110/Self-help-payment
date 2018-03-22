<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\ElectricityFees::class, function (Faker $faker) {
    $updated_at = $faker->dateTimeThisMonth();
    $created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'updated_at' => $updated_at,
        'created_at' => $created_at,
    ];
});
