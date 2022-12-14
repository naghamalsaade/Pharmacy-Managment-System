<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Type;

use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    return [
        'name_type' => $faker->word                                             ,
    ];
});
