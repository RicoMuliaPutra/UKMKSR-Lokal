<?php

namespace App\Http\Controllers;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class pengurusController extends Controller
{
    // public function index(){
    //     return view ('admin.kepengurusan.index');
    // }

    public function index()
    {
        // Mengambil semua pengurus beserta data terkait menggunakan eager loading
        $pengurus = Pengurus::with('anggota', 'jabatan.divisi', 'periode', 'pengurusProgramKerjas.programKerja')->get();
        return view('admin.kepengurusan.index', compact('pengurus'));
    }
}
