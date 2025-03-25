<?php

use App\Http\Controllers\NavigateController;
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
    return view('admin.dashboard');
 })->middleware(['auth', 'verified'])->name('dashboard');

 Route::get('/akun', [NavigateController::class, 'akun'])->middleware(['auth', 'verified'])->name('akun');
 Route::get('/anggota', [NavigateController::class, 'anggota'])->name('anggota');
 Route::get('/nilai', [NavigateController::class, 'nilai'])->name('nilai');
 Route::get('/clustering', [NavigateController::class, 'clustering'])->name('clustering');
 Route::get('/tentang', [NavigateController::class, 'tentang'])->name('tentang');
 Route::get('/kegiatan', [NavigateController::class, 'kegiatan'])->name('kegiatan');
 Route::get('/layanan', [NavigateController::class, 'layanan'])->name('layanan');
//  Route::get('/blog', [NavigateController::class, 'blog'])->name('blog');
 Route::get('/galeri', [NavigateController::class, 'galeri'])->name('galeri');

 Route::resource('/blogadmin', BlogController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/Tentangkami', [TentangkamiController::class ,'tentangme'])->name('tentangme');
Route::get('/sejarah', [TentangkamiController::class, 'sejarah'])->name('sejarah');
Route::get('/LambangPmi', [TentangkamiController::class, 'lambang'])->name('lambang');
Route::get('/LayananKami', [LayananPageController::class, 'layananPage'])->name('layananksr');
Route::get('/TimKesehatan', [LayananPageController::class, 'layananSiaga'])->name('timkesehatan');
Route::get('/Fasilitator', [LayananPageController::class, 'layananFacilitator'])->name('fasilitator');

Route::get('/Blog', [BlogController::class, 'Blogging'])->name('bloging');
Route::get('/blog{id}', [BlogController::class, 'detail'])->name('blog.show');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');










require __DIR__.'/auth.php';
