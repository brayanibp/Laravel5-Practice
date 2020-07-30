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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('prueba', function () {
	return "Hola esto es una prueba";
});

Route::get('params/{parametro}', function ($param) {
	return "Esto es una ruta con parametros que recibio el texto: $param";
});

Route::get('opt/{param?}/{otro?}', function ($param = "@param 1", $otro = "@param 2") {
	return "Este es el primer parametro $param, Este es el segundo $otro";
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
