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
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

use App\Http\Controllers\ReviewController;
Route::post('/review', [ReviewController::class, 'store'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| MAIN PAGES
|--------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'index']);


/*
|--------------------------------------------------------------------------
| AUTHENTICATION (USER)
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::view('/register', 'register');

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/home');
});

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

use App\Http\Controllers\ProfileController;

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::post('/profile/update', [ProfileController::class, 'update']);


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





