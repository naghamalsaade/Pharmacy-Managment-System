<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CosmeticProduct;

use Faker\Generator as Faker;

$factory->define(CosmeticProduct::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'ingredients' => $faker->sentence(3,true),
        'description' => $faker->sentence(3, true),
        'product_id' => factory(App\Models\Product::class),
    ];
});
