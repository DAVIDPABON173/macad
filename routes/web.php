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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/documento', 'DocumentoController');

Route::resource('/archivo', 'ArchivoController');

Route::get('/categoria/{categoria}' , 'CategoriaController@show')->name('categoria.show');
Route::get('/categoria/{categoria}/edit' , 'CategoriaController@edit')->name('categoria.edit');
Route::get('/categoria/' , 'CategoriaController@index')->name('categoria.index');
Route::post('/categoria/' , 'CategoriaController@store');
