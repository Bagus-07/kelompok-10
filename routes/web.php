<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| MAIN PAGES
|--------------------------------------------------------------------------
*/
Route::view('/home', 'home');
Route::view('/profile', 'profile');

/*
|--------------------------------------------------------------------------
| AUTHENTICATION (USER)
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index']);
Route::post('/register', [LoginController::class, 'register']);
Route::view('/register', 'register');

/*
|--------------------------------------------------------------------------
| GOOGLE AUTH
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

/*
|--------------------------------------------------------------------------
| CUSTOMER / USER DATA
|--------------------------------------------------------------------------
*/
Route::get('/customer', [CustomerController::class, 'tampilkan']);

/*
|--------------------------------------------------------------------------
| PRODUCT / ROOMS (Bagus)
|--------------------------------------------------------------------------
*/
Route::get('/rooms', [RoomController::class, 'index']);

// Optional alias (kalau mau tetap ada /product)
Route::get('/product', [RoomController::class, 'index']);

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::view('/login-admin', 'login_admin');
Route::get('/dashboard', [DashboardController::class, 'tampilkan']);





