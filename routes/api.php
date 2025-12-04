<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('users')->group(function () {
    Route::match(['POST'], '/add', [UserController::class, 'store']);
    Route::match(['POST'], '/edit/{id}', [UserController::class, 'update']);
    Route::match(['GET'], '/', [UserController::class, 'list']);
    Route::match(['GET'], '/{id}', [UserController::class, 'show']);
    Route::match(['POST'], '/getrelated/{id}', [UserController::class, 'relation']);
});
Route::prefix('products')->group(function () {
    Route::match(['POST'], '/create', [ProductController::class, 'store']);
    Route::match(['POST'], '/update/{id}', [ProductController::class, 'update']);
    Route::match(['POST'], '/', [ProductController::class, 'list']);
    Route::match(['POST'], '/{id}', [ProductController::class, 'show']);
    Route::match(['POST'], '/delete/{id}', [ProductController::class, 'delete']);
});
