<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
			// rtrim() removes the period at the end
				'title' => rtrim($faker->sentence(rand(5,10)), "."),
			// the "true" parameter makes the output one big string instead of an array
				'body' => $faker->paragraphs(rand(3,7), true),
				'views' => rand(0, 10),
				'answers' => rand(0, 10),
				'votes' => rand(-3, 10)
    ];
});
