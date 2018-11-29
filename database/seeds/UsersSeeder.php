<?php

use Carbon\Carbon;
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
        $faker = Faker\Factory::create();
        DB::table('users')->insert([
            'school_info_id' => 1,
            'name' => "Muhammad Diaz",
            'username' => 'diazram',
            'email' => 'muhamaddiaz10'.'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        for($i = 0; $i < 5; $i++) {
            $name = $faker->name;
            DB::table('users')->insert([
                'school_info_id' => 1,
                'name' => $name,
                'username' => strtolower($name),
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
                'role' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        for($i = 0; $i < 5; $i++) {
            $name = $faker->name;
            DB::table('users')->insert([
                'school_info_id' => 1,
                'name' => $name,
                'username' => strtolower($name),
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
                'role' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        for($i = 1; $i < 11; $i++) {
            DB::table('configs')->insert([
                'user_id' => $i,
                'background_image' => null,
                'public' => true
            ]);
        }
    }
}
