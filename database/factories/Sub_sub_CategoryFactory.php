<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Sub_sub_Category::class, function (Faker $faker) {
    return [
        'category_id' => \App\Models\SubCategory::select('category_id')->get()->random(),
        'sub_category_id' => \App\Models\SubCategory::all()->random()->id,
        'sub_sub_category_name' => $faker->unique()->city,
        'sub_sub_category_banner' => $faker->imageUrl($width = 850, $height = 350),
    ];
});
