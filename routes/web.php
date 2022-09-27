<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/logout_user',function()
{
   Auth::logout();
   return Redirect::to('login');
}
);

Route::get('/dashboard','DashBoard\DashBoardController@show');


Route::get('/themes', function () {
    return view('themes');
});

