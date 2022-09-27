<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EffectiveMaterial;

use Faker\Generator as Faker;

$factory->define(EffectiveMaterial::class, function (Faker $faker) {
    return [
        'name' => $faker->word                                             ,
    ];
});
