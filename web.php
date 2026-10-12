<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route resource posts (7 methods: index, create, store, show, edit, update, destroy)
Route::resource('posts', PostController::class);

// Bonus: pencarian
Route::get('/search', [PostController::class, 'search'])->name('posts.search');
