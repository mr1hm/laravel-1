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

Route::get('/users', 'UsersApiController@getAllUsers');

Route::post('/users/create', 'UsersApiController@create');

Route::get('/users/{userID}', 'UsersApiController@getUser');

Route::post('/users/update/{user}', 'UsersApiController@updateUser');
