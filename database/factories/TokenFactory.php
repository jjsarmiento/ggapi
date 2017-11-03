<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Token::class, function (Faker $faker) {
    return [
    	'content'		=>	Hash::make("hello"),
    	'user_id'		=>	$faker->numberBetween($min = 1, $max = 10),
    	'user_agent'	=>	$faker->userAgent,
    	'expires_at'	=>	$faker->dateTime('2017-11-20 08:37:17')
    ];
});
