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

Route::get('user', function () {
    return "sunovabitch";
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
Route::get('test/borrar/{id}','TestController@destroy');
Route::post('test/actualizar/','TestController@edit');
/*
|--------------------------------------------------------------------------
| rutas de accion para crear,modificar Categorias
|--------------------------------------------------------------------------
|
*/
Route::post('categorias/almacenar','CategoriasController@store');
Route::get('categorias/nuevo/{id}','CategoriasController@show');
Route::get('categorias/borrar/{id}/{idtest}','CategoriasController@destroy');
Route::post('categorias/actualizar/','CategoriasController@edit');
/*
|--------------------------------------------------------------------------
| rutas de accion para crear,modificar preguntas
|--------------------------------------------------------------------------
|
*/
Route::post('preguntas/almacenar','PreguntasController@store');
Route::get('preguntas/mostrar/{id}/{idTest}','PreguntasController@show');
Route::get('preguntas/borrar/{id}/{idCategoria}','PreguntasController@destroy');
Route::post('preguntas/actualizar/','PreguntasController@edit');
/*
|--------------------------------------------------------------------------
| rutas de accion para crear,modificar Incisos
|--------------------------------------------------------------------------
|
*/
Route::post('incisos/actualizar','IncisosController@update');