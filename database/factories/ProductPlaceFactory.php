<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductPlace;

use Faker\Generator as Faker;

$factory->define(ProductPlace::class, function (Faker $faker) {
    return [
    	'closet' => $faker->word,
        'rack' => $faker->word,
        'drawer' => $faker->word,
    ];
});
