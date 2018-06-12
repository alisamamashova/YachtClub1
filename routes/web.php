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

//клиент
Route::get('/', 'YachtsController@index');//страница со всеми яхтами
Route::get('/yachts/{id}', 'YachtsController@show');//страница для отдельной яхте
Route::post('/yachtsAdd','YachtsController@store')->name('storeYacht');//добавление новых яхт
//АДМИН
//экипаж
Route::get('/staff', 'StaffController@index');//вывод списка экипажа
Route::get('/staff/{id}', 'StaffController@show');//вывод отдельного моряка
Route::post('/editStaff/{id}', 'StaffController@edit');
Route::post('/staff', 'StaffController@store');//добавление экипажа
Route::post('/deleteStaff/{id}','StaffController@destroy');//удаление экипажа
//владелец
Route::get('/owner', 'OwnersController@index');//вывод всех владельцев
Route::get('/owner/{id}', 'OwnersController@show');//вывод отдельного владельца
Route::post('/owner', 'OwnersController@store')->name('storeOwner');//добавление владельца
Route::post('/deleteOwner/{id}','OwnersController@destroy');//удаление владельца
//клиент
Route::get('/client','ClientsController@index'); //список всех клиентов
Route::get('/client/{id}','ClientsController@show');//вывод информации по каждому клиенту
Route::post('/client', 'ClientsController@store');//подтверждение статуса клиента
//аренда
Route::get('/rents','RentsController@index');
Route::get('/rents/{id}','RentsController@show');



Auth::routes();

Route::get('/staff', 'StaffController@index')->name('staff');
