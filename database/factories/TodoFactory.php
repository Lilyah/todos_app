<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3), // 3 words
        'description' => $faker->paragraph(4), // 4 sentences
        'completed' => false
    ];
});
