<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\SubCategory::class, function (Faker $faker) {
    return [
        'category_id' => \App\Models\Category::all()->random()->id,
        'sub_category_name' => $faker->unique()->country,
        'sub_category_banner' => $faker->imageUrl($width = 850, $height = 350),
    ];
});
