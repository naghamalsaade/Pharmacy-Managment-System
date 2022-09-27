<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Medicine;

use Faker\Generator as Faker;

$factory->define(Medicine::class, function (Faker $faker) {
    return [
        'generic_name' => $faker->name,
        'medicine_name' => $faker->name,
        'alternative_medicine' => $faker->sentence(2),
        'caliber' => $faker->sentence(2),
        'composition' => $faker->sentence(2),
        'indications' => $faker->sentence(2),
    	'product_id' => factory(App\Models\Product::class),
        'type_id' => App\Models\Type::all()->random()->id,
        'category_id' => App\Models\Category::all()->random()->id,
        'age_group_id' => App\Models\AgeGroup::all()->random()->id,
    ];

});
