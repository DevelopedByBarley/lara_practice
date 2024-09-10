<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/posts', [PostController::class, 'create'])->middleware('auth:web')->name('create');
