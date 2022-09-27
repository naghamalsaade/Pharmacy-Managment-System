<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MedicalFood;

use Faker\Generator as Faker;

$factory->define(MedicalFood::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'storage' =>  $faker->paragraph(1, true),
        'adverse_effects' => $faker->sentences(3,true),
        'product_id' => factory(App\Models\Product::class),
    ];
});
