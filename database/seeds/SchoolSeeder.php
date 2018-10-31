<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_infos')->insert([
            'school_name' => "SMAN 1 Parakansalak",
            'school_region' => 'Jawa Barat',
            'school_city' => 'Sukabumi',
            'phone_number' => '087710263763'
        ]);
    }
}
