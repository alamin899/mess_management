<?php

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

Route::get('/user',[UserManagementController::class, 'index']);
Route::post('/user',[UserManagementController::class, 'store']);
Route::get('/user/{user_id}',[UserManagementController::class, 'show']);
Route::put('/user/{user_id}',[UserManagementController::class, 'update']);
Route::delete('/user/{user_id}',[UserManagementController::class, 'destroy']);
Route::patch('/user/{user_id}',[UserManagementController::class, 'restore']);
