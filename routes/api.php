<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::match(['POST'], '/register', [RegisterController::class, 'register'])->name('register');
Route::match(['POST'], '/login', [RegisterController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('users')->group(function () {
        Route::match(['POST'], '/show', [UserController::class, 'show']);
        Route::match(['POST'], '/create', [UserController::class, 'store']);
        Route::match(['POST'], '/getrelated/{id}', [UserController::class, 'relation']);
    });
    Route::prefix('products')->group(function () {
        Route::match(['POST'], '/show', [ProductController::class, 'show']);
        Route::match(['POST'], '/create', [ProductController::class, 'store']);
        Route::match(['POST'], '/update/{id}', [ProductController::class, 'update']);
        Route::match(['POST'], '/list', [ProductController::class, 'all']);
    });
});
