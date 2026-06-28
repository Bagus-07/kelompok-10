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
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

use App\Http\Controllers\ReviewController;
Route::post('/review', [ReviewController::class, 'store'])->middleware('auth');

Route::delete('/review/{review}', [ReviewController::class, 'destroy'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| MAIN PAGES
|--------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'index']);

Route::get('/rooms', [RoomController::class, 'index'])
    ->name('rooms');

Route::get('/language/{locale}', function ($locale) {

    if (!in_array($locale, ['id', 'en'])) {
        abort(400);
    }

    session(['locale' => $locale]);

    return redirect()->back();
});

// PAYMENT
Route::get('/payment', [PaymentController::class, 'index'])
    // ->middleware('auth')
    ->name('payment');

Route::post('/payment/process', [PaymentController::class, 'process'])
    ->middleware('auth')
    ->name('payment.process');

    Route::post('/payment/upload-proof',
    [PaymentController::class, 'uploadProof'])
    ->middleware('auth')
    ->name('payment.uploadProof');
    
Route::get('/payment-success', function () {
    return view('payment.success');
})->name('payment.success');

Route::post('/booking/store',
    [RoomController::class, 'book'])
    ->name('booking.store')
    ->middleware('auth');

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

Route::delete('/profile/delete', [ProfileController::class, 'destroy'])
    ->middleware('auth');

Route::post('/profile/password', [ProfileController::class, 'updatePassword'])
    ->middleware('auth');
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

    //crud user
    Route::get('/user', [UserController::class, 'index'])
        ->name('user');

    Route::post('/user/store', [UserController::class, 'store'])
        ->name('user.store');
    
    Route::put('/user/{id}', [UserController::class, 'update'])
        ->name('user.update');

    Route::delete('/user/{id}', [UserController::class, 'destroy'])
        ->name('user.destroy');

    // CRUD tipe kamar
    Route::get('/kamar', [TipeKamarController::class, 'index'])
        ->name('kamar');

    Route::post('/tipe-kamar', [TipeKamarController::class, 'store'])
        ->name('tipe-kamar.store');

    Route::put('/tipe-kamar/{id}', [TipeKamarController::class, 'update'])
        ->name('tipe-kamar.update');

    Route::delete('/tipe-kamar/{id}', [TipeKamarController::class, 'destroy'])
        ->name('tipe-kamar.destroy');

    // CRUD KAMAR
Route::post('/kamar/store', [KamarController::class, 'store'])
    ->name('kamar.store');

Route::put('/kamar/{id}', [KamarController::class, 'update'])
    ->name('kamar.update');

Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])
    ->name('kamar.destroy');

// BOOKING
Route::get('/booking',
    [AdminBookingController::class, 'index'])
    ->name('admin.booking');

Route::put('/booking/{id}/approve',
    [AdminBookingController::class, 'approve'])
    ->name('booking.approve');

Route::put('/booking/{id}/reject',
    [AdminBookingController::class, 'reject'])
    ->name('booking.reject');

// LAPORAN
Route::get('/laporan',
    [LaporanController::class, 'index']
    )->name('laporan');

});

