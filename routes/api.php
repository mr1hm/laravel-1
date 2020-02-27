<?php

use App\Users;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users', 'UsersApiController@index');

Route::post('/users/create', 'UsersApiController@store');

Route::get('/users/{userID}', 'UsersApiController@show');

Route::get('/users/{user}/edit', 'UsersApiController@edit');

Route::post('/users/update/{user}', 'UsersApiController@update');

// If you would like to use the method override way using {{ method_field('PATCH') }}:
// 1. Comment out the the Route::post('/users/update/{user}', ...) and uncomment the line of code underneath.
// 2. Send a PATCH request to http://laravel-1.test/api/users/update/{userID}
// Route::patch('/users/update/{user}', 'UsersApiController@update');
