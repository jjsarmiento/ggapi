<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'title'		=>	$faker->sentence($nbWords = 6, $variableNbWords = true) ,
        'content'	=>	$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'img'		=>	$faker->url
    ];
});
