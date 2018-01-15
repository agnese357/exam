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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController');
Route::get('/braucieni/visi', 'BraucieniController@index');
Route::get('/braucieni/{id}', 'BraucieniController@show');
Route::get('/user/{id}', 'ProfilsController@index');
Route::get('/profils/mans', 'ProfilsController@mine');
Route::get('/mani', 'BraucieniController@mine');
