<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BasketController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;


//Auth
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Basket
Route::prefix('basket')->group(function () {
    Route::get('/', [BasketController::class, 'index']);
    Route::post('/add', [BasketController::class, 'add']);
    Route::post('/remove', [BasketController::class, 'remove']);
    Route::post('/clear', [BasketController::class, 'clear']);
});

Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);

    // Product
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);

    // Orders / Checkout
    Route::post('/checkout', CheckoutController::class);
    Route::get('/orders', OrderController::class);
});
