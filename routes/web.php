<?php

use App\Http\Controllers\Api\Backend\PaymentHeadController;
use App\Http\Controllers\Api\Backend\UserManagementController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::view('/dashboard','Backend.dashboard.dashboard');
    Route::get('/payment-head/list',[PaymentHeadController::class, 'listData']);
    Route::get('/user/list',[UserManagementController::class, 'userList']);


});
