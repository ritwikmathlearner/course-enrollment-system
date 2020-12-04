<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->word,
        'semester' => $faker->word,
        'class_room' => $faker->word,
        'time' => $faker->word,
    ];
});
