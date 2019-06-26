<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(SubCategoriesTableSeeder::class);
         $this->call(Sub_sub_CategoriesTableSeeder::class);
         $this->call(BrandsTableSeeder::class);
         $this->call(ColorsTableSeeder::class);
         $this->call(ProductsTableSeeder::class);
         $this->call(ProductImagesTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(AdminsTableSeeder::class);
    }
}
