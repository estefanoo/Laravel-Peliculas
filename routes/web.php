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
Route::get('/', 'HomeController@index')->name('name');

/////////////   INICIO      /////////////

Route::get('/', 'PeliculasController@peliculasAleatorias');


/////////////   ADMIN ACTORES      /////////////

Route::get('/admActores', 'ActoresController@index')->middleware("administrador");

Route::get('/admAgregarActor', 'ActoresController@create')->middleware("administrador");
Route::post('/admAgregarActor', 'ActoresController@store');

Route::get('/admModificarActor/{id}', 'ActoresController@edit')->middleware("administrador");
Route::post('/admModificarActor/{id}', 'ActoresController@update');

Route::get('/eliminarActor/{id}', 'ActoresController@destroy');


/////////////    ADMIN  PELICULAS      /////////////

Route::get('/admPeliculas', 'PeliculasController@index')->middleware("administrador");

Route::get('/admAgregarPelicula', 'PeliculasController@create')->middleware("administrador");
Route::post('/admAgregarPelicula', 'PeliculasController@store');

Route::get('/admModificarPelicula/{id}', 'PeliculasController@edit')->middleware("administrador");
Route::post('/admModificarPelicula/{id}', 'PeliculasController@update');

Route::get('/eliminarPelicula/{id}', 'PeliculasController@destroy');


/////////////      TITULOS      /////////////

Route::get('/titulos', 'PeliculasController@mostrarTitulos');
