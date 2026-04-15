<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;




//Route::get('/', function () {
//    return view('welcome');
//});

// Route::get('/', [HomeController::class, 'index']);
// Route::get('/contact', [HomeController::class, 'contact']);









Route::get('/login', [LoginController::class, 'index']);

//nayla//
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::view('/profile', 'profile');

Route::view('/home', 'home');

use App\Http\Controllers\CustomerController;

Route::get('/customer', [CustomerController::class, 'tampilkan']);

//Bagus

use App\Http\Controllers\RoomController;

Route::get('/rooms', [RoomController::class, 'index']);