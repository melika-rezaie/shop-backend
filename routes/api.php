<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AdminController;


Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->group(function () {
    // ========== داشبورد ==========
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // ========== مدیریت سفارشات ==========
    Route::get('/orders', [AdminController::class, 'orders']);
    Route::put('/orders/{id}/status', [AdminController::class, 'updateOrderStatus']);

    // ========== مدیریت کاربران ==========
    Route::get('/users', [AdminController::class, 'users']);
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser']);
    Route::put('/users/{id}/toggle-admin', [AdminController::class, 'toggleAdmin']);

    // ========== مدیریت محصولات ==========
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});

// ========== مسیرهای عمومی (بدون احراز هویت) ==========
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// مشاهده محصولات برای عموم
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// ========== مسیرهای محافظت شده (نیاز به توکن) ==========
Route::middleware('auth:sanctum')->group(function () {
    // احراز هویت
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // مدیریت محصولات (فقط ادمین)
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
});
