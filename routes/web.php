<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('auth.login');
});
Route::group(['namespace' => 'Backend', 'middleware' => 'auth'], function () {
    Route::view('/dashboard','Backend.dashboard.dashboard');
});
