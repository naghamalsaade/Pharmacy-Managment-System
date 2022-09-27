<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BuyBill;

use Faker\Generator as Faker;

$factory->define(BuyBill::class, function (Faker $faker) {
    return [
    	'recieve_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'total_price' => $faker->numberBetween(10000,50000),
        'total_payment' => $faker->numberBetween(10000,50000),
        'buy_order_id' => App\Models\BuyOrder::all()->random()->id,
        'user_id' => App\User::all()->random()->id,                    
    ];
});
