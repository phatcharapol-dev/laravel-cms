<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
    	'category_id' => $faker->randomElement($array= array(1,2,3,4,5)),
    	'user_id' => $faker->randomElement($array= array(1,2,3)),
    	'photo_id' => 0,
        'title'=> $faker->sentence($nbWords = 6, $variableNbWords = true),
        'body' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
