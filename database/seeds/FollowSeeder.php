<?php

use Illuminate\Database\Seeder;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(0, 50) as $index) {
            \App\Follow::create([
                'follower_id' => $faker->numberBetween(1, 49),
                'leader_id' => $faker->numberBetween(1, 49),
                'follow' => $faker->boolean,
            ]);
        }
    }
}
