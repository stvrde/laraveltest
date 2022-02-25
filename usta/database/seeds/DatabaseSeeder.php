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

        $this->call(MatchTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(MatchCommentsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(MediaCommentSeeder::class);


    }
}
