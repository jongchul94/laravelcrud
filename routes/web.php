<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', '\App\Http\Controllers\PostController@index') -> name('index');

Route::get('/post/create', '\App\Http\Controllers\PostController@create') -> name('create');

Route::post('/post', '\App\Http\Controllers\PostController@store') -> name('store');

Route::get('/post/{id}', '\App\Http\Controllers\PostController@show') -> name('show');

Route::get('/post/{id}/edit', '\App\Http\Controllers\PostController@edit') -> name('edit');

Route::put('/post/{id}', '\App\Http\Controllers\PostController@update') -> name('update');

Route::delete('/post/{id}', '\App\Http\Controllers\PostController@destroy') -> name('destroy');
