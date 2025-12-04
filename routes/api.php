<?php

use App\Http\Controllers\OrderController;
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
    Route::match(['DELETE'], '/destroy/{id}', [UserController::class, 'delete']);
    Route::match(['GET'], '/orders/{id}', [UserController::class, 'getOrders']);
});
Route::prefix('products')->group(function () {
    Route::match(['POST'], '/add', [ProductController::class, 'store']);
    Route::match(['POST'], '/edit/{id}', [ProductController::class, 'update']);
    Route::match(['GET'], '/', [ProductController::class, 'list']);
    Route::match(['GET'], '/{id}', [ProductController::class, 'show']);
    Route::match(['GET'], '/orders/{id}', [ProductController::class, 'getOrders']);
    Route::match(['DELETE'], '/destroy/{id}', [ProductController::class, 'delete']);
});
Route::prefix('orders')->group(function () {
    Route::match(['POST'], '/add', [OrderController::class, 'store']);
    Route::match(['POST'], '/edit/{id}', [OrderController::class, 'update']);
    Route::match(['GET'], '/{id}', [OrderController::class, 'show']);
});
