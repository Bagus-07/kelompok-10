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

Route::get('/rooms', function () {
    return view('pages.rooms');
})->name('rooms');

Route::get('/payment', function () {
    return view('pages.payment');
})->middleware('auth')->name('payment');

/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::view('/register', 'pages.register');
Route::post('/register', [LoginController::class, 'register']);

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', function () {

    $isAdmin = auth()->check() && auth()->user()->role == 'admin';

    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    // ADMIN
    if ($isAdmin) {
        return redirect('/admin/login');
    }

    // GUEST
    return redirect('/home');

})->name('logout');

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

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::post('/profile/update', [ProfileController::class, 'update']);

/*
|--------------------------------------------------------------------------
| ROOMS
|--------------------------------------------------------------------------
*/
//Route::get('/rooms', [RoomController::class, 'index']);
//Route::get('/product', [RoomController::class, 'index']);

/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AdminLoginController;

Route::get('/admin/login', [AdminLoginController::class, 'index']);
Route::post('/admin/login', [AdminLoginController::class, 'login']);

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'tampilkan']);

    Route::view('/user', 'pages.user');

    Route::view('/kamar', 'pages.kamar');

    Route::view('/booking', 'pages.booking');

    Route::view('/laporan', 'pages.laporan');

});