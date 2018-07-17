<?php

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
    return view('index');
});

Route::get('user-login', function () {
    return view('login');
});

Route::get('user-register', function () {
    return view('register');
});

Route::get('user-forgot-password', function () {
    return view('forgot-password');
});