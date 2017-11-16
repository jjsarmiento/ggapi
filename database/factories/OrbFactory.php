<?php

use Faker\Generator as Faker;

$factory->define(App\Orb::class, function (Faker $faker) {
    return [
    	'title' 		=> $faker->title,
    	'description' 	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    	'consecutive' 	=> $faker->boolean($chanceOfGettingTrue = 50),
    	'img' 			=> $faker->url,
    	'tag'			=> $faker->word,
    	'access'		=> $faker->boolean($chanceOfGettingTrue = 50),
    	'owner_id'		=> 1
    ];
});
