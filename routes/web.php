<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index']);
Route::post('/take-taxi', [UserController::class, 'taxi_request']);
Route::get('/register', [DriverController::class, 'register_get']);
Route::post('/register', [DriverController::class, 'register_post']);

Route::get('/login', [DriverController::class, 'login_get']);
Route::post('/login', [DriverController::class, 'login_post']);

Route::get('/register-user', [UserController::class, 'register_get']);
Route::post('/register-user', [UserController::class, 'register_post']);

Route::get('/login-user', [UserController::class, 'login_get']);
Route::post('/login-user', [UserController::class, 'login_post']);

Route::get('/taxi', [UserController::class, 'taxi']);