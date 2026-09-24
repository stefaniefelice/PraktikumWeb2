<?php

use App\Http\Controllers\ProjectController;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/education', fn() => view('education'))->name('education');
Route::get('/projects', fn() => view('projects'))->name('projects');

Route::resource('projects', ProjectController::class);

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/halo/{nama?}', function ($nama = 'Tanpa Nama') {
//     return '<h1>Halo ' . $nama . '</h1>';
// });

// // Redirect tanpa closure
// Route::redirect('/lama', '/baru');

// // Named route
// Route::get('/home', function () {
//     return view('home');
// })->name('home');

// Route::get('/about', function () {
//     return view('about');
// })->name('about');

// Route::get('/halo/{nama}', function ($nama) {
//     return 'Halo ' . $nama;
// })->name('halo');

// Route::get('/halo-dunia', function () {
//     return view('halo_dunia');
// });

// Route::get('/sapa/{nama}', function ($nama) {
//     return 'Halo ' . $nama;
// })->name('halo');

// Route::get('/halo-blade', function () {
//     return view('halo', ['data' => 'Contoh data']);
// });

// // Route group dengan prefix
// Route::prefix('portfolio')->group(function () {
//     Route::get('/', fn() => view('portfolio.home'))
//         ->name('portfolio.home');
//     Route::get('/about', fn() => view('portfolio.about'))
//         ->name('portfolio.about');
//     Route::get('/projects', fn() => view('portfolio.projects'))
//         ->name('portfolio.projects');
// });











