<?php

/*
|--------------------------------------------------------------------------
| Notification Routes
|--------------------------------------------------------------------------
|
| Here is where you can register notification routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

    /*--------------------------------------------------------------------------
    | NotificationController
    |--------------------------------------------------------------------------*/
    Route::group(['prefix' => 'notification', 'namespace' => 'Notification'], function () {

        Route::get('show-expired-notification/{id}/{note_id}', 'NotificationController@showExpiredNote');
        Route::get('show-amount-notification/{id}/{note_id}', 'NotificationController@showAmountOutOfStock');

        Route::get('spoliation/{id}', 'NotificationController@spoliation');
        Route::get('return/{id}', 'NotificationController@return');
    });
});

