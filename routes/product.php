<?php

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
|
| Here is where you can register product routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

    Route::group(['namespace'=>'Product'], function (){

        /*--------------------------------------------------------------------------
        | MedicalSupplyController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Supply', 'prefix' => 'medical-supply'], function () {
           
            //add medical supply
            Route::get('create', 'MedicalSupplyController@create');
            Route::post('store', 'MedicalSupplyController@store')->name('medicalSupply.store');

            //edite medical supply
            Route::get('edit/{id}', 'MedicalSupplyController@edit');
            Route::post('update/{id}', 'MedicalSupplyController@update')->name('medicalSupply.update');

            //show all medical supplies
            Route::get('all', 'MedicalSupplyController@all');

            //show all medical supplies in pharmacy
            Route::get('all-in-pharmacy', 'MedicalSupplyController@allInPharmacy');

            //show all medical supplies in pharmacy
            Route::get('all-in-inventory', 'MedicalSupplyController@allInInventory');

            //delete medical supply
            Route::get('delete/{id}', 'MedicalSupplyController@delete')->name('medicalSupply.delete');

            //show all medical supplies in pharmacy as grid
            Route::get('/supply-grid-in-pharmacy','MedicalSupplyController@grid');

            //show medical supply details
            Route::get('/show-details/{id}', 'MedicalSupplyController@showDetails');

            //show all batchs of medical supply in pharmacy
            Route::get('/show-batch/{id}', 'MedicalSupplyController@showBatches');
        });


        /*--------------------------------------------------------------------------
        | MedicalFoodController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Food', 'prefix' => 'medical-food'], function () {
   
            //add medical food
            Route::get('create', 'MedicalFoodController@create');
            Route::post('store', 'MedicalFoodController@store')->name('medicalFood.store');

            //edite medical food
            Route::get('edit/{id}', 'MedicalFoodController@edit');
            Route::post('update/{id}', 'MedicalFoodController@update')->name('medicalFood.update');

            //show all medical foods
            Route::get('all', 'MedicalFoodController@all');

            //show all medical foods in pharmacy
            Route::get('all-in-pharmacy', 'MedicalFoodController@allInPharmacy');

            //show all medical foods in inventory
            Route::get('all-in-inventory', 'MedicalFoodController@allInInventory');

            //delete medical food
            Route::get('delete/{id}', 'MedicalFoodController@delete')->name('medicalFood.delete');

            //show all medical foods in pharmacy as grid
            Route::get('/food-grid-in-pharmacy','MedicalFoodController@grid');

            //show medical food details
            Route::get('/show-details/{id}', 'MedicalFoodController@showDetails');

            //show all batchs of medical food in pharmacy
            Route::get('/show-batch/{id}', 'MedicalFoodController@showBatches');
        });


        /*--------------------------------------------------------------------------
        | CosmeticProductController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Cosmetic', 'prefix' => 'cosmetic-product'], function () {

            //add cosmetic product
            Route::get('create', 'CosmeticProductController@create');
            Route::post('store', 'CosmeticProductController@store')->name('cosmeticProduct.store');

            //edite cosmetic product
            Route::get('edit/{id}', 'CosmeticProductController@edit');
            Route::post('update/{id}', 'CosmeticProductController@update')->name('cosmeticProduct.update');

            //show all cosmetic products
            Route::get('all', 'CosmeticProductController@all');

            //show all cosmetic products in pharmacy
            Route::get('all-in-pharmacy', 'CosmeticProductController@allInPharmacy');

            //show all cosmetic products in inventory
            Route::get('all-in-inventory', 'CosmeticProductController@allInInventory');

            //delete cosmetic product
            Route::get('delete/{id}', 'CosmeticProductController@delete')->name('cosmeticProduct.delete');

            //show all cosmetic products in pharmacy as grid
            Route::get('/cosmetic-grid-in-pharmacy','CosmeticProductController@grid');

            //show cosmetic product details
            Route::get('/show-details/{id}', 'CosmeticProductController@showDetails');

            //show all batchs of cosmetic product in pharmacy
            Route::get('/show-batch/{id}', 'CosmeticProductController@showBatches');
        });


        /*--------------------------------------------------------------------------
        | MedicineController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Medicine', 'prefix' => 'medicine'], function () {

            //add medicine
            Route::get('create', 'MedicineController@create');
            Route::post('store', 'MedicineController@store')->name('medicine.store');

            //edite medicine
            Route::get('edit/{id}', 'MedicineController@edit');
            Route::post('update/{id}', 'MedicineController@update')->name('medicine.update');

            //show all  medicines 
            Route::get('all', 'MedicineController@all');

            //show all  medicines in pharmacy
            Route::get('all-in-pharmacy', 'MedicineController@allInPharmacy');

            //show all  medicines in inventory
            Route::get('all-in-inventory', 'MedicineController@allInInventory');

            //delete medicine
            Route::get('delete/{id}', 'MedicineController@delete')->name('medicine.delete');

            //show all medicines in pharmacy as grid
            Route::get('/medicine-grid-in-pharmacy','MedicineController@grid');

            //show medicine details
            Route::get('/show-details/{id}', 'MedicineController@showDetails');

            //show all batchs of medicine in pharmacy
            Route::get('/show-batch/{id}', 'MedicineController@showBatches');
        });


        /*--------------------------------------------------------------------------
        | TypeController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Medicine', 'prefix' => 'type'], function () {

            //add type
            Route::get('create', 'TypeController@create');
            Route::post('store', 'TypeController@store')->name('type.store');

            //edite type
            Route::get('edit/{id}', 'TypeController@edit');
            Route::post('update/{id}', 'TypeController@update')->name('type.update');

            //show all types
            Route::get('all', 'TypeController@all');

            //delete type
            Route::get('delete/{id}', 'TypeController@delete')->name('type.delete');
        });


        /*--------------------------------------------------------------------------
        | AgeGroupController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Medicine', 'prefix' => 'age-group'], function () {

            //add age group
            Route::get('create', 'AgeGroupController@create');
            Route::post('store', 'AgeGroupController@store')->name('ageGroup.store');

            //edite age group
            Route::get('edit/{id}', 'AgeGroupController@edit');
            Route::post('update/{id}', 'AgeGroupController@update')->name('ageGroup.update');

            //show all age groups
            Route::get('all', 'AgeGroupController@all');

            //delete age group
            Route::get('delete/{id}', 'AgeGroupController@delete')->name('ageGroup.delete');
        });


        /*--------------------------------------------------------------------------
        | CategoryController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Medicine', 'prefix' => 'category'], function () {

            //add category
            Route::get('create', 'CategoryController@create');
            Route::post('store', 'CategoryController@store')->name('category.store');

            //adite category
            Route::get('edit/{id}', 'CategoryController@edit');
            Route::post('update/{id}', 'CategoryController@update')->name('category.update');

            //show all categories
            Route::get('all', 'CategoryController@all');

            //delete category
            Route::get('delete/{id}', 'CategoryController@delete')->name('category.delete');
        });


        /*--------------------------------------------------------------------------
        | EffectiveMaterialController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Medicine', 'prefix' => 'effective-material'], function () {

            //add effective material
            Route::get('create', 'EffectiveMaterialController@create');
            Route::post('store', 'EffectiveMaterialController@store')->name('effectiveMaterial.store');

            //edite effective material
            Route::get('edit/{id}', 'EffectiveMaterialController@edit');
            Route::post('update/{id}', 'EffectiveMaterialController@update')->name('effectiveMaterial.update');

            //show all effective materials
            Route::get('all', 'EffectiveMaterialController@all');

            //delet effective material
            Route::get('delete/{id}', 'EffectiveMaterialController@delete')->name('effectiveMaterial.delete');
        });

        /*--------------------------------------------------------------------------
        | ReportController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Report', 'prefix' => 'report'], function () {

            //amount of medicines in pharmacy
            Route::get('medicine-amount', 'ReportController@medicineAmount');

            //amount of medical supplies in pharmacy
            Route::get('medical-supply-amount', 'ReportController@medicalSupplyAmount');

            //amount of medical foods in pharmacy
            Route::get('medical-food-amount', 'ReportController@medicalFoodAmount');

            //amount of cosmetic products in pharmacy
            Route::get('cosmetic-product-amount', 'ReportController@cosmeticProductAmount');

            //expired medicines in pharmacy
            Route::get('medicine-expired', 'ReportController@medicineExpired');

            //expired medical foods in pharmacy
            Route::get('medical-food-expired', 'ReportController@medicalFoodExpired');

            //expired cosmetic products in pharmacy
            Route::get('cosmetic-product-expired', 'ReportController@cosmeticProductExpired');

            //out of stock medicines in pharmacy
            Route::get('medicine-out-of-stock', 'ReportController@medicineOutOfStock');

            //out of stock medical supplies in pharmacy
            Route::get('medical-supply-out-of-stock', 'ReportController@medicalSupplyOutOfStock');

            //out of stock medical foods in pharmacy
            Route::get('medical-food-out-of-stock', 'ReportController@medicalFoodOutOfStock');

            //out of stock cosmetic products in pharmacy
            Route::get('cosmetic-product-out-of-stock', 'ReportController@cosmeticProductOutOfStock');

        });
    });
});

