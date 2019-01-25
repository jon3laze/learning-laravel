<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
    	'owner_id' => factory(App\User::class),
        'title' => $faker->sentence,
        'description' => $faker->paragraph
    ];
});
