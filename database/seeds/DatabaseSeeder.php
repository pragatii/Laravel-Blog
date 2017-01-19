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
        $this->call(UserDataSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
    }
}
