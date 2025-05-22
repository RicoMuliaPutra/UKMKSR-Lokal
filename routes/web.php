<?php

use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\NavigateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\LayananPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ClusteringController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataNilaiController;
use App\Http\Controllers\pengurusController;
use App\Http\Controllers\devisiController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\PesanLayananController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::middleware(['auth', 'humas_ksr'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'humas_ksr'])->group(function () {
    Route::get('/akun', [NavigateController::class, 'akun'])->middleware(['auth', 'verified'])->name('akun');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/kegiatan', [NavigateController::class, 'kegiatan'])->name('kegiatan');
    Route::get('galeri/tambah-foto', [GaleriController::class, 'tambahFoto'])->name('galeri.tambah.foto');
    Route::get('galeri/tambah-video', [GaleriController::class, 'tambahVideo'])->name('galeri.tambah.video');
    Route::post('galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
    Route::get('galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::resource('/blogadmin', BlogController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::get('/anggota/search', [AnggotaController::class, 'search'])->name('anggota.search');
    Route::post('/anggota/import', [AnggotaController::class, 'importExcel'])->name('anggota.import');
    Route::resource('nilai', DataNilaiController::class);
    Route::resource('clustering', ClusteringController::class);
    Route::get('/cluster', [ClusteringController::class, 'cluster']);
    Route::get('/cluster/print', [ClusteringController::class, 'printCluster']);
    Route::resource('/kegiatan', KegiatanController::class);
    Route::resource('/tentang', TentangController::class);
    Route::resource('/service', LayananPageController::class);
    Route::post('/service/toggle/{id}', [LayananPageController::class, 'toggle'])->name('service.toggle');
    Route::resource('/Kepengurusan', pengurusController::class);
    Route::resource('/devisi', devisiController::class);
    Route::post('/jabatan_create', [devisiController::class, 'storeJabatan'])->name('jabatan.store');
    Route::post('/Periode_create', [devisiController::class, 'storePeriode'])->name('Periode.store');
    Route::resource('/Program_kerja', ProgramKerjaController::class);
    Route::resource('/pesan-layanan', PesanLayananController::class);
    Route::post('/kegiatan/toggle/{id}', [KegiatanController::class, 'toggle'])->name('kegiatan.toggle');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

////////////landing Page////////////
Route::get('/LayananKami', [LayananPageController::class, 'layananPage'])->name('layananksr');
Route::get('/lambangPMI', [TentangController::class, 'lambang'])->name('lambang');
Route::get('/SejarahKsr', [TentangController::class, 'sejarah'])->name('sejarah');
Route::get('/Visi_misi', [TentangController::class, 'visimisi'])->name('visimisi');
Route::get('/SerVice' , [LayananPageController::class, 'wellayanan'])->name('serviceksr');
Route::get('/serVice/{id}', [LayananPageController::class, 'detail'])->name('service.detail');
Route::get('/SerVice', [LayananPageController::class, 'wellayanan'])->name('serviceksr');
Route::get('/KegiatanKami', [KegiatanController::class, 'viewPage'])->name('aktifitas');
Route::get('/calendar-events', [KegiatanController::class, 'getKegiatan']);
Route::get('/struktur', [pengurusController::class, 'tampilanblade'])->name('struktur');
Route::get('/kepengurusan/periode', [pengurusController::class, 'pengurusPerPeriode'])->name('kepengurusan.periode');
Route::get('/pengurus', [pengurusController::class, 'dataPengurus'])->name('pengurus');
Route::get('/program-kerja', [ProgramKerjaController::class, 'viewpage'])->name('proker');
Route::get('/pesan-layanan/create', [PesanLayananController::class, 'create'])->name('pesan_layanan.create');
Route::post('/pesan-layanan', [PesanLayananController::class, 'store'])->name('pesan_layanan.store');
Route::get('/DataAnggota', [AnggotaController::class, 'dataAnggota'])->name('dataAnggota');
Route::get('/DataAnggota/search', [AnggotaController::class, 'cari'])->name('anggota.cari');
Route::get('/Blog', [BlogController::class, 'Blogging'])->name('bloging');
Route::get('/blog/{id}', [BlogController::class, 'detail'])->name('blog.detail');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/kegiatan-detail/{id}', [KegiatanController::class, 'detailshow'])->name('kegiatanshow.detail');





Route::get('/doras', [KegiatanController::class, 'doras'])->name('doras');




require __DIR__ . '/auth.php';
