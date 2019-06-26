<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Color::class, function (Faker $faker) {
    return [
        'color_name' => $faker->unique()->colorName,
    ];
});
