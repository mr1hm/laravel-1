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

Route::get('/users', function () {

    $users = DB::table('users')->get();

    return view('users.usersList', compact('users'));

});

Route::post('/users/create', function () {



});

Route::post('/users/update/{id}', function ($id) {

    $user = DB::table('users')->find($id);

    dd($id);

});
