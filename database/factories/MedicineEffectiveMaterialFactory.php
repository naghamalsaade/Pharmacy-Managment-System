<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MedicineEffectiveMaterial;

use Faker\Generator as Faker;

$factory->define(MedicineEffectiveMaterial::class, function (Faker $faker) {
    return [
        'medicine_id' => App\Models\Medicine::all()->random()->id,
        'effective_material_id' => App\Models\EffectiveMaterial::all()->random()->id,
    ];
});
