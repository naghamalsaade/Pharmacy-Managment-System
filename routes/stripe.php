<?php

/*
|--------------------------------------------------------------------------
| Stripe Routes
|--------------------------------------------------------------------------
|
| Here is where you can register stripe routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

    Route::group(['namespace' => 'Stripe'], function () {
    
        /*--------------------------------------------------------------------------
        | StripePaymentController
        |--------------------------------------------------------------------------*/
        Route::get('stripe', 'StripePaymentController@stripe');
        Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

    });

});

