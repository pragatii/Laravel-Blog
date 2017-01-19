<?php

use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=100; $i++){
            \App\User::create(
                [
                    'name'=>'Poko'.$i,
                    'email'=>'email@'.$i,
                    'password'=>'poko1234'
                ]
            );

        }
    }
}
