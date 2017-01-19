<?php

use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $user = \App\User::all()->pluck('id')->toArray();
        $article = \App\Articles::all()->pluck('id')->toArray();
        $type = ['like', 'comment'];
        $value = ['like'=>'1', 'comment'=> '0'];

        for ($i = 0; $i <= 100; $i++) {
            $typeData=$faker->randomElement($type);
            $valueData='';
            if($typeData=='comment'){
                $valueData=$faker->text(50);
            }
            \App\Actions::create(
                [
                    'user_id' => $faker->randomElement($user),
                    'article_id' => $faker->randomElement($article),
                    'type'=>$typeData,
                    'value'=>$valueData

                ]
            );
        }
    }
}
