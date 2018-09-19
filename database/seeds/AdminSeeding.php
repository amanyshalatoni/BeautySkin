<?php

use Illuminate\Database\Seeder;

class AdminSeeding extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach(range(0,50)as $index){
            \App\Admin::create([
                "name" => $faker->name,
                "username" => $faker->username,
                "email" => $faker->email,
                "phone" => $faker->phoneNumber,
                "password" => \Illuminate\Support\Facades\Hash::make("123456"),
            ]);
        }
    }
}
