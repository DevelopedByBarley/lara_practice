<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'showLoginPage'])->name('login');
Route::get('/register', [UserController::class, 'showRegisterPage'])->name('register');

Route::get('/user/dashboard', [UserController::class, 'dashboard'])->middleware('auth:web')->name('dashboard');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'store'])->name('store');
