<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;




//Route::get('/', function () {
//    return view('welcome');
//});

// Route::get('/', [HomeController::class, 'index']);
// Route::get('/contact', [HomeController::class, 'contact']);









Route::get('/login', [LoginController::class, 'index']);