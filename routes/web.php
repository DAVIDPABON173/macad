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
    return view('auth/login');
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::group(['middleware' => ['web']], function () {
	Route::resource('documento' , 'DocumentoController');
});*/
Route::resource('/documento', 'DocumentoController');
Route::get('/documento/{documento}/archivos' , 'DocumentoController@misArchivos')->name('documento.misArchivos');

Route::resource('/archivo', 'ArchivoController');
Route::get('/archivo/view/find', 'ArchivoController@find')->name('archivo.find');
Route::post('/archivo/showArchivosFind' , 'ArchivoController@showArchivosFind')->name('archivo.showArchivosFind');

Route::get('/categoria/' , 'CategoriaController@index')->name('categoria.index');
Route::get('/categoria/create' , 'CategoriaController@create')->name('categoria.create');
Route::post('/categoria/' , 'CategoriaController@store')->name('categoria.store');
Route::get('/categoria/{categoria}' , 'CategoriaController@show')->name('categoria.show');
Route::get('/categoria/{categoria}/edit' , 'CategoriaController@edit')->name('categoria.edit');
Route::match(['put', 'pach'], '/categoria/{categoria}', 'CategoriaController@update')->name('categoria.update');
Route::get('/categoria/{categoria}/documentos' , 'CategoriaController@misDocumentos')->name('categoria.misDocumentos');




