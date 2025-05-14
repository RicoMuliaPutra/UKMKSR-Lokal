<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Galeri;
use App\Models\blog;
// use Illuminate\Pagination\Paginator;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      Paginator::useTailwind();

    View::composer('welcome', function ($view) {
        $tipe = request()->input('tipe', 'semua');
        $layanans = Layanan::where('status', 'aktif')->get();
        $blogs = Blog::latest()->take(3)->get();
        $query = Galeri::with('jenisGaleri')->where('status', 'aktif');
        if ($tipe === 'foto') {
            $query->whereNotNull('foto_galeri');
        } elseif ($tipe === 'video') {
            $query->whereNotNull('video_galeri');
        }
       $galeri = $query->paginate(6);
        $view->with([
            'layanans' => $layanans,
            'blogs' => $blogs,
            'tipe' => $tipe,
            'galeri' => $galeri,
        ]);
    });

    }
}
