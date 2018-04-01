<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for ($i = 0; $i < 10; $i++){
            DB::table('posts')->insert([ //,
                'url' => $faker->unique()->word,
                'title' => $faker->unique()->sentence($nbWords = 6),
                'description' => $faker->paragraph($nbSentences = 1),
                'content' => $faker->text,
                'image' => $faker->randomElement($array = array ('blog01.jpg','blog02.jpg','blog03.jpg','blog04.jpg')),
                'blog' => '1',
                'category_id' => $faker->numberBetween($min = 1, $max = 3),
                'author_id' => $faker->numberBetween($min = 1, $max = 3),
                'created_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}
