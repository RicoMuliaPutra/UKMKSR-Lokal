<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Layanan;
use App\Models\blog;
use Illuminate\Pagination\Paginator;



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
        View::composer('welcome', function ($view) {
            $layanans = Layanan::where('status', 'aktif')->get();
            $blogs = Blog::latest()->take(3)->get();

            $view->with('layanans', $layanans);
            $view->with('blogs', $blogs);
            Paginator::useTailwind();
        });
    }
}
