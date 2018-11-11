<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $i = 0;
        $user = \App\User::find(2);
        while($i < 10) {
            DB::table('forum')->insert([
                'user_id' => 2,
                'school_info_id' => $user->schoolInfo()->first()->id,
                'title' => $faker->state,
                'description' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $i++;
        }
    }
}
