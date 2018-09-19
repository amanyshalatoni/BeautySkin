<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
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
            $image = $faker->image(public_path('image'));
            $image = str_replace(public_path(), '', $image);
            \App\Post::create([
                'expert_id' => $faker->numberBetween(1,49),
                'title' => $faker->title,
                'body' => $faker->paragraph,
                'image' => $faker->$image,
            ]);
        }
    }
}
