<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tentang-kami', function () {
    return view('tentang-kami'); })->name('tentang-kami');

Route::get('/sejarah', function () {
    return view('sejarah'); })->name('sejarah');

Route::get('/ddl', function () {
    return view('ddl'); })->name('ddl');






require __DIR__.'/auth.php';
