<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;


class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Models\Warehouse::class, 20)->create();
        factory(App\Models\BuyOrder::class, 20)->create();
        factory(App\Models\BuyProduct::class, 20)->create();
        factory(App\Models\BuyBill::class, 20)->create();
        factory(App\Models\BuyBillProduct::class, 20)->create();
        factory(App\Models\ProductPlace::class, 20)->create();
        factory(App\Models\BookIn::class, 20)->create();


    }
}
