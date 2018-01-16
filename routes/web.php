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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController');

Route::get('/braucieni/visi', 'BraucieniController@index');
Route::get('/braucieni/mani', 'BraucieniController@mine');
Route::get('braucieni/jauns', 'BraucieniController@create');
Route::get('/braucieni/{id}/labot', 'BraucieniController@edit');
Route::get('/braucieni/{id}', 'BraucieniController@show');
Route::resource('braucieni', 'BraucieniController');

Route::put('admin', 'ProfilsController@updaterole');
Route::get('/user/mans', 'ProfilsController@show');
Route::get('/user/{id}/labot', 'ProfilsController@edit');
Route::get('/user/{id}', 'ProfilsController@index');
Route::resource('user', 'ProfilsController');

Route::resource('atsauksmes', 'AtsauksmesController');

Route::resource('pasazieri', 'PasazieriController');

