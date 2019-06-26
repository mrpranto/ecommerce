<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->text($maxNbChars = 100),
        'category_id' => \App\Models\Category::all()->random()->id,
        'sub_category_id' => 1,
        'sub_sub__category_id' => 1,
        'brand_id' => \App\Models\Brand::all()->random()->id,
        'short_description' => $faker->text($maxNbChars = 200),
        'long_description'  => $faker->realText($maxNbChars = 700),
        'sku'  => $faker->numberBetween($min = 100000, $max = 999999),
        'color_id'  => \App\Models\Color::all()->random()->id,
        'size'  => 'L',
        'price'  => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});
