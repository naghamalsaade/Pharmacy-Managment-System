<?php

/*
|--------------------------------------------------------------------------
| Inventory Routes
|--------------------------------------------------------------------------
|
| Here is where you can register inventory routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

  Route::group(['namespace'=>'Inventory'], function (){

    /*--------------------------------------------------------------------------
    | InventoryController
    |--------------------------------------------------------------------------*/
    Route::group(['prefix' => 'inventory'], function () {

      //show all inventories
      Route::get('all', 'InventoryController@all');

      //show all warehouses in inventory
      Route::get('warehouses-list/{branch_id}','InventoryController@allWareHouse');     

      //show all orders in inventory
      Route::get('orders-list/{branch_id}','InventoryController@allOrder');

      //show all buy bills in inventory
      Route::get('buy-bills-list/{branch_id}','InventoryController@allBuyBill');

      //show all products in inventory
      Route::get('product-list/{branch_id}','InventoryController@allProduct');
  });

    /*--------------------------------------------------------------------------
    | WarehouseController
    |--------------------------------------------------------------------------*/
    Route::group(['namespace'=>'WareHouse', 'prefix' => 'warehouse'], function () {

      //add warehouse
      Route::get('add','WarehouseController@create');
      Route::post('store','WarehouseController@store')->name('warehouse.store');

      //edite warehouse
      Route::get('edit/{id}', 'WarehouseController@edit');
      Route::post('update/{id}', 'WarehouseController@update')->name('warehouse.update');

      //delete warehouse
      Route::get('delete/{id}', 'WarehouseController@delete')->name('warehouse.delete');

      //show all warehouses
      Route::get('all','WarehouseController@all');

      //show all warehouses in inventory
      Route::get('all-in-inventory','WarehouseController@allInInventory');

      //show all orders
      Route::get('order-list/{warehouse_id}','WarehouseController@allOrder');

      //show all buy bills
      Route::get('buy-bills-list/{warehouse_id}','WarehouseController@allBuyBill');
    });

    /*--------------------------------------------------------------------------
    | BuyOrderController
    |--------------------------------------------------------------------------*/
    Route::group(['namespace'=>'Order', 'prefix' => 'order'], function () {

      //show all order to warehouse
      Route::get('all','BuyOrderController@all');

      //show orders to warehouse in inventory
      Route::get('all-in-inventory','BuyOrderController@allInInventory');

      //add order from inventory to warehouse
      Route::get('add','BuyOrderController@create');
      Route::POST('store','BuyOrderController@store')->name('order.store');

      //show all products in certain order
      Route::get('products/{id}','BuyProductController@all');

      //delete order
      Route::get('delete/{id}', 'BuyOrderController@delete')->name('order.delete');  //------

    });

    /*--------------------------------------------------------------------------
    | BuyBillController
    |--------------------------------------------------------------------------*/
    Route::group(['namespace'=>'BuyBill','prefix' => 'buy-bill'], function () {

      //show all buy bill
      Route::get('all','BuyBillController@all');

      //show all buy bill in inventory
      Route::get('all-in-inventory','BuyBillController@allInInventory');

      //add buyBill
      Route::get('add/{id}','BuyBillController@create');
      Route::POST('store','BuyBillController@store')->name('buyBill.store');

      //show all products in buy bill
      Route::get('products/{id}','BuyBillProductController@all');

      //pay amount of buybill
      Route::post('/payment/store/{id}','BuyBillController@addPayment')->name('payment.store');

    });

    /*--------------------------------------------------------------------------
    | TransformController
    |--------------------------------------------------------------------------*/
    Route::group(['namespace'=>'Transform', 'prefix' => 'transform'], function () {

      //transform product frome inventory to pharmacy
      Route::get('product/{id}/{amount}', 'TransformController@transform');
      Route::post('store', 'TransformController@store')->name('transform.store');

    });

  });
  
});
