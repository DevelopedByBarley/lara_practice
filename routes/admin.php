<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'showLoginPage'])->name('login');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(AdminAuthMiddleware::class)->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->middleware(AdminAuthMiddleware::class)->name('admin.logout');
    Route::post('/', [AdminController::class, 'login'])->name('admin.login');
});
