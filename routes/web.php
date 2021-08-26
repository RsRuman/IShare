<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::post('/newsletter', NewsletterController::class);

Route::get('/', [PostController::class, 'all']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::any('/logout', [SessionController::class, 'logout'])->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');

Route::post('/login', [SessionController::class, 'login']);

Route::post('/comments/{post:slug}/comments', [CommentController::class, 'store']);

Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware('admin');

Route::post('/admin/posts', [PostController::class, 'store']);

Route::get('/admin/dashboard', [AdministratorController::class, 'index']);
