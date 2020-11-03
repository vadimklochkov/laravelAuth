<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts');
})->name('home');

Route::get('/allUsers', function () {
    return redirect('/allUsers');
})->name('allUsers');

Route::get('/sign_in', function () {
    return view('/sign_in');
})->name('sign_in');

Route::get('/sign_up', function () {
    return view('/sign_up');
})->name('sign_up');

Route::post('/auth/sign_in', 'AuthController@sign_in');

//Route::get('/users', 'AuthController@all');

Route::resource('/users', 'UserController');

Route::post('/auth/sign_up', 'AuthController@sign_up');
