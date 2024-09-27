<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Route::match(['POST'], '/register', [RegisterController::class, 'register'])->name('register');
// Route::match(['POST'], '/login', [RegisterController::class, 'login'])->name('login');
// Route::middleware('auth:sanctum')->group(function () {
//     Route::prefix('products')->group(function () {
//         Route::match(['POST'], '/list', [ProductController::class, 'all'])->middleware('auth:sanctum');
//     });
// });
