<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([

            'role_id' => '1',
            'name' => 'M.R Pranto',
            'email' => 'prantoabir1@gmail.com',
            'password' => bcrypt('11223344'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),

        ]);

        DB::table('admins')->insert([

            'role_id' => '2',
            'name' => 'Pranto Abir',
            'email' => 'prantoabir420@gmail.com',
            'password' => bcrypt('11223344'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),

        ]);

    }
}
