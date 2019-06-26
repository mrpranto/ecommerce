<?php

use Illuminate\Database\Seeder;

class Sub_sub_CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Sub_sub_Category::class,70)->create();
    }
}
