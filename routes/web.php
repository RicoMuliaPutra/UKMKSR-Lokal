<?php

use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\NavigateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\TentangkamiController;
use App\Http\Controllers\LayananPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AnggotaController;





Route::get('/', function () {
    return view('welcome');
})->name('welcome');


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
 Route::get('/nilai', [NavigateController::class, 'nilai'])->name('nilai');
 Route::get('/clustering', [NavigateController::class, 'clustering'])->name('clustering');
 Route::get('/kegiatan', [NavigateController::class, 'kegiatan'])->name('kegiatan');
 Route::get('/galeri', [NavigateController::class, 'galeri'])->name('galeri');



 Route::resource('/blogadmin', BlogController::class);
 Route::resource('anggota', AnggotaController::class)->except(['show']);
 Route::get('/anggota/search', [AnggotaController::class, 'search'])->name('anggota.search');
 Route::resource('/kegiatan', KegiatanController::class);
 Route::resource('/service', LayananPageController::class);



 Route::resource('/tentang', TentangController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

////////////landing Page////////////
Route::get('/Tentangkami', [TentangkamiController::class, 'tentangme'])->name('tentangme');
Route::get('/sejarah', [TentangkamiController::class, 'sejarah'])->name('sejarah');
Route::get('/LambangPmi', [TentangkamiController::class, 'lambang'])->name('lambang');
Route::get('/LayananKami', [LayananPageController::class, 'layananPage'])->name('layananksr');

Route::get('/TimKesehatan', [LayananPageController::class, 'layananSiaga'])->name('timkesehatan');
Route::get('/Fasilitator', [LayananPageController::class, 'layananFacilitator'])->name('fasilitator');

Route::get('/DataAnggota', [AnggotaController::class, 'dataAnggota'])->name('dataAnggota');
Route::get('/DataAnggota/search', [AnggotaController::class, 'cari'])->name('anggota.cari');



Route::get('/Blog', [BlogController::class, 'Blogging'])->name('bloging');
Route::get('/blog{id}', [BlogController::class, 'detail'])->name('blog.show');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');

Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
Route::post('/kegiatan/toggle/{id}', [KegiatanController::class, 'toggle'])->name('kegiatan.toggle');

Route::get('/layanan', [LayananPageController::class, 'index'])->name('layanan.index');
Route::get('/layanan/create', [LayananPageController::class, 'create'])->name('layanan.create');
Route::post('/layanan', [LayananPageController::class, 'store'])->name('layanan.store');
Route::get('/layanan/{id}/edit', [LayananPageController::class, 'edit'])->name('layanan.edit');
Route::put('/layanan/{id}', [LayananPageController::class, 'update'])->name('layanan.update');
Route::delete('/layanan/{id}', [LayananPageController::class, 'destroy'])->name('layanan.destroy');
Route::post('/layanan/toggle/{id}', [LayananPageController::class, 'toggle'])->name('layanan.toggle');

Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');
Route::get('/tentang/create', [TentangController::class, 'create'])->name('tentang.create');
Route::post('/tentang', [TentangController::class, 'store'])->name('tentang.store');
Route::get('/tentang/{id}', [TentangController::class, 'show'])->name('tentang.show');
Route::get('/tentang/{id}/edit', [TentangController::class, 'edit'])->name('tentang.edit');
Route::put('/tentang/{id}', [TentangController::class, 'update'])->name('tentang.update');
Route::delete('/tentang/{id}', [TentangController::class, 'destroy'])->name('tentang.destroy');










require __DIR__ . '/auth.php';
