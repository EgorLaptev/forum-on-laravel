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
Route::match(['post', 'get'], 'posts/create', 'App\Http\Controllers\PostController@create')->middleware('auth')->name('posts.create');
Route::get('posts/delete/{post}', 'App\Http\Controllers\PostController@delete')->middleware(['auth', 'can:delete,post'])->name('posts.delete');
Route::get('posts/like/{post_id}', 'App\Http\Controllers\PostController@like')->name('posts.like');
Route::get('posts/{post}', 'App\Http\Controllers\PostController@show')->name('posts.show');

// Comments
Route::post('comment/create/{post_id}', 'App\Http\Controllers\CommentController@create')->middleware('auth')->name('comment.create');
Route::get('comment/like/{comment_id}', 'App\Http\Controllers\CommentController@like')->name('comment.like');
Route::get( 'comment/delete/{comment}', 'App\Http\Controllers\CommentController@delete')->middleware('auth')->name('comment.delete');
