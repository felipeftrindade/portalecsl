<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('blog_categories')->insert(['name' => 'NEWS']);
      DB::table('blog_categories')->insert(['name' => 'TUTORIAL']);
      DB::table('blog_categories')->insert(['name' => 'LINUX']);
      DB::table('blog_categories')->insert(['name' => 'WINDOWS']);
      DB::table('blog_categories')->insert(['name' => 'MAC']);
    }
}
