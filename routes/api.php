<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('users',[UserController::class, 'index']);
Route::post('users/store',[UserController::class, 'store']);
Route::get('users/{id}',[UserController::class, 'show']);

Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

Route::get('/addresses',[AddressController::class, 'index']);
Route::post('/addresses/store', [AddressController::class, 'store']);
Route::get('/addresses/{id}',[AddressController::class, 'show']);

Route::put('/addresses/{id}', [AddressController::class, 'update']);
Route::delete('/addresses/{id}', [AddressController::class, 'destroy']);
