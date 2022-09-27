<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
	   DB::table('roles')->insert([
	[ 'name'=>'admin', 'display_name'=>'Admin'
	],
	[ 'name'=>'employeeInventory', 'display_name'=>'employeeInventory'
	],
	[ 'name'=>'employeePharmacy', 'display_name'=>'employeePharmacy'
	],

	]);



	DB::table('permissions')->insert([
      [ 'name'=>'Transfer Between Branch'],
      [ 'name'=>'Branch Control'],
      [ 'name'=>'Users Control'],
      [ 'name'=>'Reports Control'],
      [ 'name'=>'spoiled products Control'],
      [ 'name'=>'Enter product information'],

	    
	       ]);
	
 //  DB::table('invoices')->insert([
 // ['branch_id' =>'1',   'total_due'=>'1000', 'total_num'=>'4','paid'=>'1000','user_id'=>'1','customer_id'=>'1'],
 // ['branch_id' =>'1','total_due'=>'1500', 'total_num'=>'6','paid'=>'1500','user_id'=>'1','customer_id'=>'1'],
 // ['branch_id' =>'1','total_due'=>'4000', 'total_num'=>'16','paid'=>'4000','user_id'=>'2','customer_id'=>'1'],
 // ['branch_id' =>'1','total_due'=>'4000', 'total_num'=>'10','paid'=>'2500','user_id'=>'2','customer_id'=>'1'],


 //   ]);



 //   DB::table('invoice__products')->insert([
 //  [ 'invoice_id'=>'1','bookIn_id'=>'1','product_num'=>'2','product_price'=>'250','product_name'=>'P1',],
 // [ 'invoice_id'=>'1','bookIn_id'=>'2','product_num'=>'2','product_price'=>'250','product_name'=>'P2',],
 //  [ 'invoice_id'=>'2','bookIn_id'=>'1','product_num'=>'2','product_price'=>'250','product_name'=>'P1',],
 //   [ 'invoice_id'=>'2','bookIn_id'=>'2','product_num'=>'4','product_price'=>'250','product_name'=>'P2',],
 // [ 'invoice_id'=>'3','bookIn_id'=>'1','product_num'=>'4','product_price'=>'250','product_name'=>'P1',],
 //  [ 'invoice_id'=>'3','bookIn_id'=>'2','product_num'=>'4','product_price'=>'250','product_name'=>'P2',],
 //   [ 'invoice_id'=>'4','bookIn_id'=>'1','product_num'=>'5','product_price'=>'250','product_name'=>'P1',],
 //    [ 'invoice_id'=>'4','bookIn_id'=>'2','product_num'=>'5','product_price'=>'250','product_name'=>'P2',],


 //   ]);


    }
}
