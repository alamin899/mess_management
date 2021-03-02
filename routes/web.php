<?php

use App\Http\Controllers\Api\Backend\PaymentCollectionController;
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
    Route::put('/payment-schedule/{payment_schedule}',[PaymentScheduleController::class, 'update'])->name('payment-schedule.update');
    Route::delete('/payment-schedule/{payment_schedule}',[PaymentScheduleController::class, 'destroy'])->name('payment-schedule.destroy');
    Route::patch('/payment-schedule/{payment_schedule}',[PaymentScheduleController::class, 'restore'])->name('payment-schedule.restore');

    //payment status
    Route::get('/payment-status',[PaymentScheduleController::class, 'paymentStatus'])->name('payment-status');

    // payment collection
    Route::post('/payment-collection',[PaymentCollectionController::class, 'store'])->name('payment-collection.store');

});
