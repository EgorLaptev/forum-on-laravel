<?php

use Illuminate\Support\Facades\Route;

// Pages
Route::get('/', 'App\Http\Controllers\PageController@home')->name('home');
Route::get('/home', 'App\Http\Controllers\PageController@home');

// Auth
Route::match(['post', 'get'], '/login', 'App\Http\Controllers\AuthController@login')->middleware('guest')->name('login');
Route::match(['post', 'get'], '/register', 'App\Http\Controllers\AuthController@register')->middleware('guest')->name('register');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->middleware('auth')->name('logout');

// Posts
Route::resource('posts', \App\Http\Controllers\PostController::class);
Route::match(['post', 'get'], 'posts/create', 'App\Http\Controllers\PostController@create')->middleware('auth')->name('posts.create');
Route::get('posts/destroy/{post}', 'App\Http\Controllers\PostController@destroy')->middleware(['auth', 'can:delete,post'])->name('posts.delete');
Route::any('posts/like/{post_id}', 'App\Http\Controllers\PostController@like')->name('posts.like');


// Comments
Route::any('comment/create/{post_id}', 'App\Http\Controllers\CommentController@create')->middleware('auth')->name('comment.create');
Route::any('comment/like/{comment_id}', 'App\Http\Controllers\CommentController@like')->name('comment.like');
Route::any('comment/delete/{comment_id}', 'App\Http\Controllers\CommentController@delete')->middleware(['auth', 'can:delete,comment'])->name('comment.delete');
