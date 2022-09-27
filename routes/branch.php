<?php

/*
|--------------------------------------------------------------------------
| Branch Routes
|--------------------------------------------------------------------------
|
| Here is where you can register branch routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

    Route::group(['namespace' => 'branch'], function () {

        /*--------------------------------------------------------------------------
        | BranchController
        |--------------------------------------------------------------------------*/
        Route::group(['prefix' => 'branch'], function () {

            //add branch
            Route::get('add','BranchController@create');
            Route::post('store','BranchController@store')->name('branch.store');

            //show all branches (inventories & pharmacies)
            Route::get('all','BranchController@all');

            //delete branch
            Route::get('delete/{branch_id}','BranchController@delete');

            //edite branch data
            Route::get('edit/{branch_id}','BranchController@edit');
            Route::post('update/{branch_id}','BranchController@update')->name('branch.update');

            //show all employees in branch
            Route::get('employees-list/{branch_id}','BranchController@allEmployee');
    });

        /*--------------------------------------------------------------------------
        | LocationController
        |--------------------------------------------------------------------------*/
        Route::group(['prefix' => 'location'], function () {

            //add location
            Route::get('add','LocationController@create');
            Route::post('store','LocationController@store')->name('location.store');

            //show all locations
            Route::get('all','LocationController@all');

            //delete location
            Route::get('delete/{id}','LocationController@delete');

            //edite location
            Route::get('edit/{id}','LocationController@edit');
            Route::post('update/{id}','LocationController@update')->name('location.update');//
        });
    });
});

