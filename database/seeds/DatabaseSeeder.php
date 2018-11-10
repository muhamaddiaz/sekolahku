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
        $this->call(GuruSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(MadingSeeder::class);
        $this->call(ForumSeeder::class);
    }
}
