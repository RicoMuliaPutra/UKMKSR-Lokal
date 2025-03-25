<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigateController extends Controller
{
    public function akun()
    {
        return view('admin.akun');
    }

    public function anggota()
    {
        return view('admin.anggota');
    }

    public function nilai()
    {
        return view('admin.nilai');
    }

    public function clustering()
    {
        return view('admin.clustering');
    }

    public function tentang()
    {
        return view('admin.tentang');
    }

    public function kegiatan()
    {
        return view('admin.kegiatan');
    }

    public function layanan()
    {
        return view('admin.layanan');
    }

    // public function blog()
    // {
    //     return view('admin.blog.index');
    // }

    public function galeri()
    {
        return view('admin.galeri');
    }
}
