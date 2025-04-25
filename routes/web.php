<?php

use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\NavigateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\LayananPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ClusteringController;
use Faker\Guesser\Name;

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
 Route::get('/kegiatan', [NavigateController::class, 'kegiatan'])->name('kegiatan');
 Route::get('/galeri', [NavigateController::class, 'galeri'])->name('galeri');



 Route::resource('/blogadmin', BlogController::class);
 Route::resource('anggota', AnggotaController::class)->except(['show']);
 Route::get('/anggota/search', [AnggotaController::class, 'search'])->name('anggota.search');
 Route::resource('clustering', ClusteringController::class);
 Route::get('/cluster', [ClusteringController::class, 'cluster']);
 Route::resource('/kegiatan', KegiatanController::class);
 Route::resource('/tentang', TentangController::class);
 Route::resource('/service', LayananPageController::class);
 Route::post('/layanan/toggle/{id}', [LayananPageController::class, 'toggle'])->name('layanan.toggle');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

////////////landing Page////////////
// Route::get('/Tentangkami', [TentangkamiController::class, 'tentangme'])->name('tentangme');
// Route::get('/sejarah', [TentangkamiController::class, 'sejarah'])->name('sejarah');
// Route::get('/LambangPmi', [TentangkamiController::class, 'lambang'])->name('lambang');

Route::get('/LayananKami', [LayananPageController::class, 'layananPage'])->name('layananksr');
Route::get('/lambangPMI', [TentangController::class, 'lambang'])->name('lambang');
Route::get('/SejarahKsr', [TentangController::class, 'sejarah'])->name('sejarah');
Route::get('/Visi_misi', [TentangController::class, 'visimisi'])->name('visimisi');



Route::get('/DataAnggota', [AnggotaController::class, 'dataAnggota'])->name('dataAnggota');
Route::get('/DataAnggota/search', [AnggotaController::class, 'cari'])->name('anggota.cari');


Route::get('/Blog', [BlogController::class, 'Blogging'])->name('bloging');
Route::get('/blog{id}', [BlogController::class, 'detail'])->name('blog.show');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');

// Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
// Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
// Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
// Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
// Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
// Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

Route::post('/kegiatan/toggle/{id}', [KegiatanController::class, 'toggle'])->name('kegiatan.toggle');

// Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');
// Route::get('/tentang/create', [TentangController::class, 'create'])->name('tentang.create');
// Route::post('/tentang', [TentangController::class, 'store'])->name('tentang.store');
// Route::get('/tentang/{id}', [TentangController::class, 'show'])->name('tentang.show');
// Route::get('/tentang/{id}/edit', [TentangController::class, 'edit'])->name('tentang.edit');
// Route::put('/tentang/{id}', [TentangController::class, 'update'])->name('tentang.update');
// Route::delete('/tentang/{id}', [TentangController::class, 'destroy'])->name('tentang.destroy');










require __DIR__ . '/auth.php';
