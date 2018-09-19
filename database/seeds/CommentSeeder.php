<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
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
            \App\Comment::create([
                 "person_id" => $faker->numberBetween(1,49),
                'post_id' => $faker->numberBetween(1,49),
                'body' => $faker->text,
            ]);
        }
    }
}
