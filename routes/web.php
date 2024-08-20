<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', '\App\Http\Controllers\PostController@index') -> name('index');

Route::get('/post/create', '\App\Http\Controllers\PostController@create') -> name('create');

Route::post('/post', '\App\Http\Controllers\PostController@store') -> name('store');
