<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BookIn;

use Faker\Generator as Faker;

$factory->define(BookIn::class, function (Faker $faker) {
    return [
    	'date' => $faker-> date($format = 'Y-m-d', $max = 'now'),
        'quantity' => $faker->randomNumber(2),
        'amount' => $faker->randomNumber(2),
        'active' => $faker->boolean(1),
        'is_amount_notify' => $faker->boolean(0),
        'is_expired_notify' => $faker->boolean(0),
        'product_place_id' => App\Models\ProductPlace::all()->random()->id,
        'branch_id' => App\Models\Branch::all()->random()->id,
        'buy_bill_product_id' => App\Models\BuyBillProduct::all()->random()->id,
    ];
});
