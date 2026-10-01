<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/education', fn() => view('education'))->name('education');

Route::resource('posts', PostController::class);
Route::resource('projects', ProjectController::class);