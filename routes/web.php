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
Route::get('/views/home', function () {

    return view('home');
});
Route::get('/views/account', function () {

    return view('account');
});
Route::get('/', 'YachtsController@index');//страница со всеми яхтами
Route::get('/yachts/{id}', 'YachtsController@show');//страница для отдельной яхте
Route::post('/yachtsAdd','YachtsController@store')->name('storeYacht');//добавление новых яхт

//админ
Route::get('/staff', 'StaffController@index');//страница экипаж
Route::get('/staff/{id}', 'StaffController@show');//вывод отдельного моряка
Route::post('/staff', 'StaffController@store');//добавление экипажа

Route::post('/owner', 'OwnersController@store');//добавление владельца
Route::get('/owner', 'OwnersController@index');//вывод всех владельцев
Route::get('/owner/{id}', 'OwnersController@show');//вывод отдельного владельца



