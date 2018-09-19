<?php

use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
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
            \App\Person::create([
                'username' => $faker->userName,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'password' =>\Illuminate\Support\Facades\Hash::make($faker->password),
                'agreed' => $faker->boolean,
                'code' => $faker->postcode,
                'long' => $faker->longitude,
                'lat' => $faker->latitude,
                'gender'=>$faker->randomElement(['male', 'female','none']),
                'age'=>$faker->numberBetween(18,34),
                'type_skin'=>$faker->randomElement(['oily skin', 'dry skin','normal skin','mix skin','sensitive skin - children']),
                'color_skin'=>$faker->randomElement(['very light', 'light','light medium','hantia','light brown','very dark']),
                'color_hair'=>$faker->randomElement(['light blond', 'red','blond','dark blond','dark brown','black']),
                'freckles'=>$faker->randomElement(['none', 'few','more']),
                'eye_color'=>$faker->randomElement(['light blue', 'gray','light green','blue','green','hazal','light brown','dark brown']),
                'height'=>$faker->randomElement(['under 150 cm','150-159 cm','160-169 cm','170-179 cm','180-189 cm','190-199 cm','more than 199']),
                'weight'=>$faker->randomElement(['under 40 kg','40-59 kg','60-79 kg','80-99 kg','100-119 kg','120-139 kg','140-159 kg','160-179 kg','180-199 kg','more than 200']),
                'activities'=>$faker->randomElement(['swimming', 'sports','working','relating','sunbathing']),
                'sensitivity'=>$faker->randomElement(['low', 'medium','high']),
                'fire'=>$faker->word,
                'spf'=>$faker->word,
                'water_resistance'=>$faker->word,
                'amount_cream'=>$faker->word,
                'image' =>$image,
                'type_of_person' => $faker->randomElement(['user', 'expert']),
                'cv' => $faker->url,
            ]);
        }
    }
}
