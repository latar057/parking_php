<?php

use Illuminate\Support\Facades\Route;

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

# Чтение данных
Route::get('/clients', 'OneController@read');

# Добавление данных
Route::get('/create', 'OneController@create')->name('create');
Route::post('/create/client', 'OneController@createClient');
Route::post('/create/car', 'OneController@createCar');

# Редактирование данных
Route::get('/update', 'OneController@update')->name('update');
Route::post('/update/client', 'OneController@updateClient');
Route::post('update/car', 'OneController@updateCar');
