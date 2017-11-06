<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
	return [
		'name_first'	=> $faker->firstNameMale,
		'name_mid' 		=> $faker->lastName,
		'name_last' 	=> $faker->lastName,
		'email' 		=> $faker->unique()->safeEmail,
		'username' 		=> $faker->unique()->userName,
		'password' 		=> Hash::make("password"),
		'birthdate' 	=> $faker->date($format = '1990-10-11'),
		'active' 		=> true,
		'gender'		=> $faker->numberBetween($min = 1, $max = 3)
	];
});
