<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tags')->insert([
          ['name' => 'Tag1'],
          ['name' => 'Tag2'],
          ['name' => 'Tag3'],
        ]);
    }
}
