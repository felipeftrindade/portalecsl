<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert(['name' => 'NEWS']);
      DB::table('categories')->insert(['name' => 'TUTORIAL']);
      DB::table('categories')->insert(['name' => 'LINUX']);
      DB::table('categories')->insert(['name' => 'WINDOWS']);
      DB::table('categories')->insert(['name' => 'MAC']);
    }
}
