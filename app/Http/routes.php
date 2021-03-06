<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontController@index');
Route::get('/contacto', 'FrontController@contacto');
Route::get('/reviews', 'FrontController@reviews');
Route::get('/admin', 'FrontController@admin');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::resource('/mail', 'MailController');
Route::resource('/usuario', 'UserController');

Route::resource('genero', 'GenderController');
Route::get('generos', 'GenderController@listing');

Route::resource('pelicula', 'MovieController');

Route::resource('/log', 'LogController');
Route::get('/logout', 'LogController@logout');

Route::get('*', 'Controller@NotFound');
