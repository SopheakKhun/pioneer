<?php

$factory->define(App\Request::class, function (Faker\Generator $faker) {
    return [
        "customer_id" => factory('App\User')->create(),
        "product_name" => $faker->name,
        "prefer_date" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "description" => $faker->name,
    ];
});
