<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
         $this->call(ProductTableSeeder::class);
         $this->call(BranchTableSeeder::class);
         $this->call(OrderTableSeeder::class);
         // $this->call(RoleSeeder::class);

       DB::table('roles')->insert([
        [ 'name'=>'admin', 'display_name'=>'Admin'],
        [ 'name'=>'employeeInventory', 'display_name'=>'Inventory Employee'],
        [ 'name'=>'employeePharmacy', 'display_name'=>'Pharmacy Employee'],

      ]);



    DB::table('permissions')->insert([
      [ 'name'=>'Transfer Between Branch'],
      [ 'name'=>'Branch Control'],
      [ 'name'=>'Users Control'],
      [ 'name'=>'Reports Control'],
      [ 'name'=>'spoiled products Control'],
      [ 'name'=>'Enter product information'],        
    ]);

    }
}
 