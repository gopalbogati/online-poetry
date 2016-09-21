<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ne_NP');
        for ($i = 0; $i < 10; $i++)
            $user = Category::create([
                'name' => $faker->name,
                'alias' => $faker->name,
                'image' => $faker->imageUrl(),
                'details' => $faker->paragraph,
                'status' => $faker->text

            ]);
        echo $user->name . "seeded" . PHP_EOL;
    }
}
