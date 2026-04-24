<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Controllers
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index']);
Route::view('/register', 'register');
/*
|--------------------------------------------------------------------------
| Main Pages
|--------------------------------------------------------------------------
*/
Route::view('/home', 'home');
Route::view('/profile', 'profile');

/*
|--------------------------------------------------------------------------
| view Home (about us dan contact), view profile guest - Nayla
|--------------------------------------------------------------------------
*/
Route::get('/customer', [CustomerController::class, 'tampilkan']);

/*
|--------------------------------------------------------------------------
| ___ - angels
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Rooms / Product Service, Admin Dashboard, login admin - Bagus
|--------------------------------------------------------------------------
*/
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/product', [RoomController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'tampilkan']);
Route::view('/login-admin', 'login_admin');




// ===============================
// GOOGLE LOGIN
// ===============================
use App\Http\Controllers\AuthController;

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);