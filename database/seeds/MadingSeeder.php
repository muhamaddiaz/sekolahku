<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 10; $i++) {
            DB::table('mading')->insert([
                'siswa_id' => 1,
                'judul_mading' => $faker->name,
                'image_mading' => $faker->image(),
                'deskripsi' => $faker->text(),
                'kategori_mading' => $faker->title
            ]);
        }
    }
}
