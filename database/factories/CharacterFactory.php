<?php

use Faker\Generator as Faker;
use App\Play;
use App\Gender;

$factory->define(App\Character::class, function (Faker $faker) {
    $gender = Gender::inRandomOrder()->first();

    return [
        'name' => $faker->name($gender->name == 'male' || $gender->name == 'female' ? $gender->name : null),
        'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'gender_id' => $gender,
        'play_id' => Play::inRandomOrder()->first()
    ];
});
