<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'school_info_id' => 1,
            'name' => "Muhammad Diaz",
            'username' => 'diazram',
            'email' => 'muhamaddiaz10'.'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 1
        ]);
    }
}
