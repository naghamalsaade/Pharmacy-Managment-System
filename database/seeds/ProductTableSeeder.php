<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Models\Type::class, 5)->create();
    	factory(App\Models\Category::class, 5)->create();
        factory(App\Models\AgeGroup::class, 5)->create();

    	factory(App\Models\EffectiveMaterial::class, 30)->create();

	    factory(App\Models\Medicine::class, 17)->create();
	    factory(App\Models\MedicalSupply::class, 14)->create();
	    factory(App\Models\MedicalFood::class, 6)->create();
	    factory(App\Models\CosmeticProduct::class, 17)->create();

	    factory(App\Models\MedicineEffectiveMaterial::class, 15)->create();
    }
}
