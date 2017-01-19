<?php

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Auth;


class ArticlesTableSeeder extends Seeder
{

    //$user=User::all()->pluck('id');


    public function run()
    {
        $faker=\Faker\Factory::create();
        $user= \App\User::all()->pluck('id')->toArray();
        for($i=0; $i<=10;$i++){
            \App\Articles::create(
                [
                    'user_id'=>$faker->randomElement($user),
                    'title'=> 'title'.$i,
                    'content'=>'this is the content of '.$i.' article'
                ]
            );
        }
    }
}
