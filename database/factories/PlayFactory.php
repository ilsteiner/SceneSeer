<?php

use Faker\Generator as Faker;
use App\Playwright;

$factory->define(App\Play::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(30),
        'year' => (rand(1,2) % 2 ? $faker->year($max = 'now') : null),
        'playwright_id' => Playwright::inRandomOrder()->first(),
    ];
});
