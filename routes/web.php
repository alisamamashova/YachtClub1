<?php

use Illuminate\Support\Facades\DB;
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

   return view('yacht');
});
Route::get('/views/home', function () {

    return view('home');
});
Route::get('/views/account', function () {

    return view('account');
});
Route::get('/', 'YachtsController@index');
Route::get('/yachts/{yacht}', 'YachtsController@show');