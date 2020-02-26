<?php

use App\Users;

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

// Route::resource('/users', 'UsersController');

Route::get('/users', 'UsersController@index');

Route::get('/users/create', 'UsersController@create');

Route::post('/users', 'UsersController@store');

Route::get('/users/{userID}', 'UsersController@show');

Route::get('/users/{user}/edit', 'UsersController@edit');

Route::post('/users/update/{user}', 'UsersController@update');

?>
