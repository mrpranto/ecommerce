<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->unique()->colorName,
        'category_banner' => $faker->imageUrl($width = 850, $height = 350),
    ];
});
