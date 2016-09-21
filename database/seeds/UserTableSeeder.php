<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create('ne_NP');
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'username' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'conformpassword' => $faker->password,
                'name' => $faker->firstName,
                'country' => $faker->streetName,
                'url' => $faker->url,
                'date' => $faker->dateTime,

            ]);
        }
        echo $user->username . "seeded" . PHP_EOL;
    }
}



