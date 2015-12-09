<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('inicio');
});


/*
|--------------------------------------------------------------------------
| rutas de accion para crear,modificar test
|--------------------------------------------------------------------------
|
*/
Route::get('test/nuevo','TestController@create');
Route::post('test/almacenar','TestController@store');
Route::get('test/mostrar','TestController@index');
Route::get('test/mostrar/{id}','TestController@show');
/*
|--------------------------------------------------------------------------
| rutas de accion para crear,modificar Categorias
|--------------------------------------------------------------------------
|
*/
Route::post('categorias/almacenar','CategoriasController@store');
Route::get('categorias/nuevo/{id}','CategoriasController@show');