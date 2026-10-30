<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/education', fn() => view('education'))->name('education');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('projects', ProjectController::class);
});

Route::middleware('auth')->get('/profile-saya', fn() => view('profile-saya'))
    ->name('profile.saya');

require __DIR__.'/auth.php';