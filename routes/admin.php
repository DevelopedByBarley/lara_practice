<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::get('/',[ AdminController::class, 'showLoginPage'])->name('login');
    Route::get('/dashboard', [AdminController::class , 'dashboard'])->middleware('auth:admin')->name('admin.dashboard');
    Route::post('/', [AdminController::class, 'login'])->name('admin.login');
});
