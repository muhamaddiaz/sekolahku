<?php

use App\User;
use App\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x = 1;
        for($i = 7; $i < 12; $i++) {
            $user = User::find($i);
            $faker = Faker\Factory::create();
            
            $guru = new Guru;
            $guru->school_info_id = 1;
            $guru->kelas_id = $x;
            $guru->nama = $user->name;
            $guru->mata_pelajaran = "Ekonomi";
            $guru->wali_kelas = 1;

            $user->guru()->save($guru);
            $x++;
        }
    }
}
