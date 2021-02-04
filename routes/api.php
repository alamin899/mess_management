<?php

use App\Http\Controllers\Api\Backend\PaymentHeadController;
use App\Http\Controllers\Api\Backend\PaymentScheduleController;
use App\Http\Controllers\Api\Backend\UserManagementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/** User Crud */
Route::get('/user',[UserManagementController::class, 'index']);
Route::post('/user',[UserManagementController::class, 'store']);
Route::get('/user/{user_id}',[UserManagementController::class, 'show']);
Route::put('/user/{user_id}',[UserManagementController::class, 'update']);
Route::delete('/user/{user_id}',[UserManagementController::class, 'destroy']);
Route::patch('/user/{user_id}',[UserManagementController::class, 'restore']);
Route::put('/user/{user_id}/pass-update',[UserManagementController::class, 'passUpdate']);

/** Payment Head Crud */
Route::get('/payment-head',[PaymentHeadController::class, 'index']);
Route::post('/payment-head',[PaymentHeadController::class, 'store']);
Route::get('/payment-head/{payment_head_id}',[PaymentHeadController::class, 'show']);
Route::put('/payment-head/{payment_head_id}',[PaymentHeadController::class, 'update']);
Route::delete('/payment-head/{payment_head_id}',[PaymentHeadController::class, 'destroy']);
Route::patch('/payment-head/{payment_head_id}',[PaymentHeadController::class, 'restore']);
Route::get('/payment-head/{payment_head_id}/status/{status_id}',[PaymentHeadController::class, 'status']);

/** Payment Head Crud */
Route::get('/payment-schedule',[PaymentScheduleController::class, 'index']);