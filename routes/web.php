<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\User;
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

Route::get('/admin/dashboard', [AdministratorController::class, 'index'])->middleware('admin');;

Route::get('/admin/posts/create', [AdministratorController::class, 'create'])->middleware('admin');
Route::post('/admin/posts', [AdministratorController::class, 'store'])->middleware('admin');;

Route::get('/admin/categories/create', [AdministratorController::class, 'createCategory'])->middleware('admin');
Route::post('/admin/categories', [AdministratorController::class, 'storeCategory'])->middleware('admin');

Route::get('/admin/user', [AdministratorController::class, 'user'])->middleware('admin');

Route::get('/admin/category', [AdministratorController::class, 'category'])->middleware('admin');

Route::post('/user/delete', [AdministratorController::class, 'userDelete']);


