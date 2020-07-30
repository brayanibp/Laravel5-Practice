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

//RUTA BASICA
Route::get('prueba', function () {
	return "Hola esto es una prueba";
});

//RUTA CON PARAMETRO
Route::get('params/{parametro}', function ($param) {
	return "Esto es una ruta con parametros que recibio el texto: $param";
});

//RUTA CON VARIOS PARAMETROS OPCIONALES
/*
	EN ESTA CLASE DE RUTAS LOS PARAMETROS SE DIVIDEN POR UN SLASH 
	Y SE VUELVEN OPCIONALES SI TIENEN UN SIGNO DE INTERROGACION
	SI UN PARAMETRO TIENE SIGNO DE INTERROGACION TODOS DEBERIAN TENER
	SALVO QUE SEA EL PRIMER PARAMETRO, SIGUIENDO ASÍ UN PATRON DE IZQUIERDA A DERECHA.
	
	SE PUEDE COLOCAR DE MANERA OPCIONAL UN VALOR POR DEFECTO A LOS PARAMETROS
*/
Route::get('opt/{param?}/{otro?}', function ($param = "@param 1", $otro = "@param 2") {
	return "Este es el primer parametro $param, Este es el segundo $otro";
});

Route::get('controladornuevo', 'ControladorNuevo@metodo');

Route::resource('movie','MovieController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
