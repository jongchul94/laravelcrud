<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', [PostController::class, 'index']) -> name('index');

Route::get('/post/create', [PostController::class, 'create']) -> name('create');

Route::post('/post', [PostController::class, 'store']) -> name('store');

Route::get('/post/{id}', [PostController::class, 'show']) -> name('show');

Route::get('/post/{id}/edit', [PostController::class, 'edit']) -> name('edit');

Route::put('/post/{id}', [PostController::class, 'update']) -> name('update');

Route::delete('/post/{id}', [PostController::class, 'destroy']) -> name('destroy');

// Route::get('/post/search' ,[PostController::class, 'search']) -> name('search');