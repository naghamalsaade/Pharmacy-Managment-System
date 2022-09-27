<?php

/*
|--------------------------------------------------------------------------
| Mail Routes
|--------------------------------------------------------------------------
|
| Here is where you can register mail routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

    /*--------------------------------------------------------------------------
    | MailController
    |--------------------------------------------------------------------------*/
    Route::group(['prefix' => 'mail', 'namespace' => 'Mail'], function () {

        Route::get('write-mail', 'MailController@writeEmail');
        Route::get('send-mail', 'MailController@sendEmail')->name('mail.send');
    });
});

