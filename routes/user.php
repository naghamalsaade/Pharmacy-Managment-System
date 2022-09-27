<?php

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register user routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

    /*--------------------------------------------------------------------------
    | UserController
    |--------------------------------------------------------------------------*/
    Route::group(['prefix' => 'user'], function () {

        //add new employee
        Route::get('create','UserController@create');
        Route::post('storeee','UserController@store')->name('user.store');

        //show all users
        Route::get('all','UserController@all');

        //show all users
        Route::get('all-employee-in-branch','UserController@allInBranch');

        //show all pharmacy users
        Route::get('pharmacies-users-list','UserController@allPharmacyEmployee');

        //show all inventory user
        Route::get('inventories-users-list','UserController@allInventoryEmployee');

        //delete user
        Route::get('delete/{id}','UserController@delete');

        //edite user
        Route::get('edit/{id}','UserController@edit');
        Route::post('update/{id}','UserController@update')->name('user.update');

        //show all activities of user
        Route::get('user-activities-list/{id}', 'UserController@userActivity');

        //show all activities
        Route::get('activity-list', 'UserController@activityList');

        //show activities in branch
        Route::get('activity-list-in-branch', 'UserController@activityInBranch');

        //show all orders for specific inventory employee
        Route::get('orders-list/{id}', 'UserController@allOrder');

        //show all buy bills for specific inventory employee
        Route::get('buy-bills-list/{id}', 'UserController@allBuyBill');

        //show all return buy bills for specific inventory employee
        Route::get('return-buy-bills-list/{id}', 'UserController@allReturnBuyBill');

        //show all invoices for specific pharmacy employee
        Route::get('invoices-list/{id}', 'UserController@allInvoice');

        //show all return invoices for specific pharmacy employee
        Route::get('return-invoices-list/{id}', 'UserController@allReturnInvoice');

        //user show his profile
        Route::get('info','UserController@infoUser');

        //user edit his information or his profile
        Route::get('edit','UserController@editUser');
        Route::post('update','UserController@updateUser')->name('user.update_info');
    });
});

