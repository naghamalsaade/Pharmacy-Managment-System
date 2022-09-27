<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BuyOrder;

use Faker\Generator as Faker;

$factory->define(BuyOrder::class, function (Faker $faker) {
    return [
    	'order_date' =>  $faker->date($format = 'Y-m-d', $max = 'now'),
        'user_id' => App\User::all()->random()->id,
        'warehouse_id' => App\Models\Warehouse::all()->random()->id,                    
    ];
});
