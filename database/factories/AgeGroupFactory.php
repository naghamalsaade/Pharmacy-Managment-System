<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AgeGroup;

use Faker\Generator as Faker;

$factory->define(AgeGroup::class, function (Faker $faker) {
    return [
        'name_age_group' => $faker->word                                             ,
    ];
});
