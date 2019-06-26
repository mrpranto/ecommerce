<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\ProductImage::class, function (Faker $faker) {
    return [
        'product_id' => \App\Models\Product::all()->random()->id,
        'product_image' => $faker->imageUrl($width = 60, $height = 70),
    ];
});
