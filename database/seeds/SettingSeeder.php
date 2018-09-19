<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach(range(0,50) as $index){
            \App\Setting::create([
                "light" => $faker->randomElement(['0', '1']) ,
                "notice" => $faker->randomElement(['0','1']),
                "language" => $faker->randomElement(['ar','en']),
                "payment by" => $faker->randomElement(['prepaid code','debit card','credit card']),
            ]);
        }
    }
}
