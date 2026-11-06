<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectGalleryController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

// publik
Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/education', fn() => view('education'))->name('education');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{project}', [PortfolioController::class, 'show'])->name('portfolio.show');

// khusus admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('posts', PostController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class)->only(['index', 'edit', 'update']);

    Route::post('projects/{project}/images', [ProjectGalleryController::class, 'store'])
        ->name('projects.images.store');
    Route::put('projects/{project}/images/{image}', [ProjectGalleryController::class, 'update'])
        ->name('projects.images.update');
    Route::delete('projects/{project}/images/{image}', [ProjectGalleryController::class, 'destroy'])
        ->name('projects.images.destroy');
});

// wajib login (semua role)
Route::middleware('auth')->get('/profile-saya', fn() => view('profile-saya'))
    ->name('profile.saya');

require __DIR__.'/auth.php';