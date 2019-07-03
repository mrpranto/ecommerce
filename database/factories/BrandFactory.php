<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Brand::class, function (Faker $faker) {
    return [
        'brand_name' => $faker->unique()->company,
        'brand_logo' => $faker->imageUrl($width = 170, $height = 93),
    ];
});
