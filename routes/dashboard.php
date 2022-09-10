<?php

use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
Route::get('/dashboard/create-post', [PostController::class, 'create'])->name('post.create');
Route::post('/dashboard/create-post', [PostController::class, 'store'])->name('post.store');
