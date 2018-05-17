<?php

$factory->define(App\Booking::class, function (Faker\Generator $faker) {
    return [
        "customer_id" => factory('App\User')->create(),
        "installer" => $faker->name,
        "date_install" => $faker->date("d/m/Y", $max = 'now'),
        "model" => $faker->name,
        "serial" => $faker->name,
    ];
});
