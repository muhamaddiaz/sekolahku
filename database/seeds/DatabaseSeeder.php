<?php

use Illuminate\Database\Seeder;
use \App\Mading;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SchoolSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(KelasSeeder::class);
    }
}
