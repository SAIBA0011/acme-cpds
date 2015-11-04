<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Cpd::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(5),
    	'description' => $faker->paragraph(10),    	
    	'points' => $points = mt_rand(2, 10),
    	'cost' => $points,
    	'accreditation_number' => str_random(8),
    	'expiry_date' => $faker->dateTimeThisYear()
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
    	'name' => 'Going forward: Continuing Professional Development',
    	'cpd_id' => factory('App\Cpd')->create()->id,
    	'link' => 'http://englishagenda.britishcouncil.org/sites/ec/files/B413%20CPD%20for%20Teachers_v2_0.pdf'
    ];
});