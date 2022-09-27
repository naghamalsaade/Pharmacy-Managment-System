<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Branch;

use Faker\Generator as Faker;

$factory->define(Branch::class, function (Faker $faker) {
    return [
    	'email' =>  $faker->unique()->safeEmail,
        'name' => $faker->name,
        'location_id' => App\Models\Location::all()->random()->id,
        'type' =>1,


    ];
});
