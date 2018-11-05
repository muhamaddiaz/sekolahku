<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 2; $i <= 6; $i++) {
            $user = User::find($i);
            DB::table('siswa')->insert([
                'school_info_id' => 1,
                'kelas_id' => 1,
                'user_id' => $user->id,
                'nama' => $user->name,
                'NISN' => $faker->creditCardNumber,
                'email' => $user->email,
                'osis' => true
            ]);
        }
    }
}
