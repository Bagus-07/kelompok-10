<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controllers
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
});

Route::view('/home', 'home');

/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::view('/register', 'register');
Route::post('/register', [LoginController::class, 'register']);

/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

/*
|--------------------------------------------------------------------------
| USER DATA
|--------------------------------------------------------------------------
*/
Route::get('/customer', [CustomerController::class, 'tampilkan']);

Route::view('/profile', 'profile')->middleware('auth');
Route::post('/profile/update', [ProfileController::class, 'update']);

/*
|--------------------------------------------------------------------------
| ROOMS
|--------------------------------------------------------------------------
*/
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/product', [RoomController::class, 'index']);

/*
|----------------------------------------------------------------------
|  LOGOUT 
|----------------------------------------------------------------------
*/
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'tampilkan'])
        ->name('dashboard');

    Route::get('/user', function () {
        return view('user');
    });

    Route::get('/kamar', function () {
        return view('kamar');
    });

    Route::get('/booking', function () {
        return view('booking');
    });

    Route::get('/laporan', function () {
        return view('laporan');
    });

});