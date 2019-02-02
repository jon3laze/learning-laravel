<?php

use Faker\Generator as Faker;

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'thread_id' => function() {
        	return factory('App\Thread')->create();
        },
        'user_id' => function() {
        	return factory('App\User')->create();
        },
        'body' => $faker->paragraph
    ];
});
