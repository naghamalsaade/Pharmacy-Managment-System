<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;

use Faker\Generator as Faker;

use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
       'image' => $faker->image,
       'bar_code' => $faker->ean13,
       'product_country' => $faker->address,
       'manufacturer_company' => $faker->company,
        // 'is_active' => $faker->boolean(1),

    ];
});
