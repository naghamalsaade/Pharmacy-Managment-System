<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MedicalSupply;

use Faker\Generator as Faker;

$factory->define(MedicalSupply::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'use_to' => $faker->sentences(3,true),
        'product_id' => factory(App\Models\Product::class),
    ];
});
