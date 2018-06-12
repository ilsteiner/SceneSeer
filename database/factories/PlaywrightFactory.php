<?php

use Faker\Generator as Faker;

$factory->define(App\Playwright::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'born' => (rand(1,2) % 2 ? $faker->date($format = 'Y-m-d', $max = 'now') : null)
    ];
});
