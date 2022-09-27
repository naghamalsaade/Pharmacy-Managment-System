<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BuyBillProduct;

use Faker\Generator as Faker;

$factory->define(BuyBillProduct::class, function (Faker $faker) {
    return [
    	'production_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'expired_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'quantity_recived' => $faker->randomNumber(2),
        'available_quantity' => $faker->randomNumber(2),
        'purchasing_price' => $faker->numberBetween(500,2000),
        'selling_price' => $faker->numberBetween(500,2000),
        'buy_bill_id' => App\Models\BuyBill::all()->random()->id,
        'buy_product_id' => App\Models\BuyProduct::all()->random()->id,
    ];
});
