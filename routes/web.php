<?php

use App\Http\Controllers\Api\Backend\PaymentHeadController;
use App\Http\Controllers\Api\Backend\PaymentScheduleController;
use App\Http\Controllers\Api\Backend\UserManagementController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::view('/dashboard','Backend.dashboard.dashboard');
    Route::get('/payment-head/list',[PaymentHeadController::class, 'listData']);
    Route::get('/user/list',[UserManagementController::class, 'userList']);

    //payment schedule
    Route::post('/payment-schedule',[PaymentScheduleController::class, 'store'])->name('payment-schedule.store');
    Route::get('/payment-schedule/{payment_schedule}',[PaymentScheduleController::class, 'show'])->name('payment-schedule.show');

    //payment status
    Route::get('/payment-status',[PaymentScheduleController::class, 'paymentStatus'])->name('payment-status');



});
