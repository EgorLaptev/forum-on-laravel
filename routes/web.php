<?php

use Illuminate\Support\Facades\Route;

// Pages
Route::get('/', 'App\Http\Controllers\PageController@home')->name('home');
Route::get('/home', 'App\Http\Controllers\PageController@home');

// Auth
Route::match(['post', 'get'], '/login', 'App\Http\Controllers\AuthController@login')->middleware('guest')->name('login');
Route::match(['post', 'get'], '/register', 'App\Http\Controllers\AuthController@register')->middleware('guest')->name('register');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->middleware('auth')->name('logout');

Route::resource('posts', \App\Http\Controllers\PostController::class);
Route::match(['post', 'get'], 'posts/create', 'App\Http\Controllers\PostController@create')->name('posts.create');

// Comments
Route::post('comment/create/{post_id}', 'App\Http\Controllers\CommentController@create')->name('comment.create');
