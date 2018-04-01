<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Felipe Trindade',
          'email' => 'user1@mail.com',
          'password' => bcrypt('senha'),
      ]);

      DB::table('users')->insert([
          'name' => 'User 2',
          'email' => 'user2@mail.com',
          'password' => bcrypt('senha'),
      ]);
      DB::table('users')->insert([
          'name' => 'User 3',
          'email' => 'user3@mail.com',
          'password' => bcrypt('senha'),
      ]);
    }
}
