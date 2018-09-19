<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $this->call(SettingSeeder::class);
        
        $this->call(AdminSeeding::class);
     //   $this->call(ExpertSeeding::class);
       // $this->call(UserSeeding::class);
        // $this->call(UsersTableSeeder::class);
    }
}
