<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TentangkamiController;
use App\Http\Controllers\LayananPageController;
use App\Http\Controllers\BlogController;




Route::get('/', function () {
    return view('welcome'); })->name('welcome');


// Route::get('/dashboard', function () {
//     return view('admin.beranda.index');
// })->middleware(['auth', 'verified']);


// Route::get('/admin/beranda', function () {
//     return view('admin.beranda.index');
// })->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
 })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/Tentangkami', [TentangkamiController::class ,'tentangme'])->name('tentangme');
Route::get('/sejarah', [TentangkamiController::class, 'sejarah'])->name('sejarah');
Route::get('/LambangPmi', [TentangkamiController::class, 'lambang'])->name('lambang');
Route::get('/LayananKami', [LayananPageController::class, 'layananPage'])->name('layanan');
Route::get('/TimKesehatan', [LayananPageController::class, 'layananSiaga'])->name('timkesehatan');
Route::get('/Fasilitator', [LayananPageController::class, 'layananFacilitator'])->name('fasilitator');

Route::get('/Blog', [BlogController::class, 'Blogging'])->name('blog');






// Route::get('/sejarah', function () {
//     return view('sejarah'); })->name('sejarah');

Route::get('/ddl', function () {
    return view('ddl'); })->name('ddl');




require __DIR__.'/auth.php';
