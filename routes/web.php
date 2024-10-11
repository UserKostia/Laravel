<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);
Route::post('store', [PostController::class, 'create']);
Route::post('posts/{post?}/edit', [PostController::class, 'edit']);
Route::post('posts/{post?}', [PostController::class, 'show']);
Route::post('posts/{id?}/store', [CommentController::class, 'store']);
Route::resource('users', UserController::class);
