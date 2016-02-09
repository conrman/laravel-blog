<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Connor Freeman',
            'email' => 'connormfreeman@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
