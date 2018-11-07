<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 10; $i <= 12; $i++) {
            for($j = 1; $j < 4; $j++) {
                DB::table('kelas')->insert([
                    'school_info_id' => 1,
                    'guru_id' => 1,
                    'tingkat_kelas' => $i,
                    'jurusan_kelas' => 'MIA',
                    'bagian_kelas' => $j
                ]); 
            }
            
        }
    }
}
