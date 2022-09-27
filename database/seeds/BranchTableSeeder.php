<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Models\Location::class, 3)->create();
        factory(App\Models\Branch::class, 4)->create();
        factory(App\User::class, 2)->create();
    }
}
