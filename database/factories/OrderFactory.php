<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1, 4),
        'description' => $faker->sentence,
        'total' => $faker->numberBetween(100, 10000),
        'created_at' => $faker->dateTimeThisYear,
    ];
});
