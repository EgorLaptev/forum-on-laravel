<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Pages
Route::get('/', 'App\Http\Controllers\PageController@home')->name('home');
Route::get('/home', 'App\Http\Controllers\PageController@home');

// Auth
Route::match(['post', 'get'], '/login', 'App\Http\Controllers\AuthController@login')->middleware('guest')->name('login');
Route::match(['post', 'get'], '/register', 'App\Http\Controllers\AuthController@register')->middleware('guest')->name('register');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->middleware('auth')->name('logout');

Route::resource('posts', \App\Http\Controllers\PostController::class);
Route::match(['post', 'get'], 'posts/create', 'App\Http\Controllers\PostController@create')->name('posts.create');
