<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "email" => $faker->safeEmail,
        "password" => str_random(10),
        "address" => $faker->name,
        "suburb" => $faker->name,
        "state" => $faker->name,
        "postcode" => $faker->randomNumber(2),
        "phone" => $faker->randomNumber(2),
        "mobile" => $faker->randomNumber(2),
        "remember_token" => $faker->name,
    ];
});
