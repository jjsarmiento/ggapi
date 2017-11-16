<?php

use Faker\Generator as Faker;

$factory->define(App\Fragment::class, function (Faker $faker) {
    return [
    	'name'			=> $faker->title,
    	'content'		=> $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
    	'description'	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    	'img'			=> $faker->url,
    	'finished'		=> $faker->boolean($chanceOfGettingTrue = 50),
    	'frag_type'		=> 1,
    	'orb_id'		=> $faker->numberBetween($min = 1, $max = 10)
    ];
});
