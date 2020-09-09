<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UF;
use Faker\Generator as Faker;

$factory->define(UF::class, function (Faker $faker) {
    return [
        'value' => $faker->numberBetween(10000,20000),
        'date_check' => now(),
    ];
});
