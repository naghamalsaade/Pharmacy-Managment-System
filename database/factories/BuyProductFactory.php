<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BuyProduct;

use Faker\Generator as Faker;

$factory->define(BuyProduct::class, function (Faker $faker) {
    return [
    	'buy_order_id' => App\Models\BuyOrder::all()->random()->id,
        'product_id' => App\Models\Product::all()->random()->id,
        'quantity_order' => $faker->randomNumber(2),                    
    ];
});
