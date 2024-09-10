<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $posts = Post::all();


    return view('welcome', [
        'posts' => $posts,
    ]);
});



require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';
require __DIR__ . '/post.php';
