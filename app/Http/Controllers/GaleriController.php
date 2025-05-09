<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\JenisGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Menampilkan semua data galeri
    public function index(Request $request)
    {
        $tipe = $request->input('tipe', 'semua');
        $query = Galeri::with('jenisGaleri')->where('status', 'aktif');

        // Filter berdasarkan tipe (foto atau video)
        if ($tipe === 'foto') {
            $query->whereNotNull('foto_galeri');  // Memfilter galeri yang memiliki foto
        } elseif ($tipe === 'video') {
            $query->whereNotNull('video_galeri');  // Memfilter galeri yang memiliki video
        }

        $galeri = $query->get();
        return view('admin.galeri.index', compact('galeri', 'tipe'));
    }

    // Menambahkan foto ke galeri
    public function tambahFoto()
    {
        $jenisGaleri = JenisGaleri::all();
        return view('admin.galeri.create', ['tipe' => 'foto', 'jenisGaleri' => $jenisGaleri]);
    }

    // Menambahkan video ke galeri
    public function tambahVideo()
    {
        $jenisGaleri = JenisGaleri::all();
        return view('admin.galeri.create', ['tipe' => 'video', 'jenisGaleri' => $jenisGaleri]);
    }

    // Menyimpan data galeri (foto atau video)
    public function store(Request $request)
    {
        $request->validate([
            'id_jenis_galeri' => 'required|exists:jenis_galeri,id_jenis_galeri',
            'foto_galeri' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'video_galeri' => 'nullable|mimes:mp4,mkv,avi',
            'status' => 'required|in:aktif,tidak',
        ]);

        $data = $request->only(['id_jenis_galeri', 'status']);

        // Simpan foto ke folder public
        // Menyimpan foto ke folder public
        if ($request->hasFile('foto_galeri')) {
            $data['foto_galeri'] = $request->file('foto_galeri')->storeAs('public/galeri/foto', $request->file('foto_galeri')->getClientOriginalName());
        }

        // Simpan video ke folder public
        if ($request->hasFile('video_galeri')) {
            $data['video_galeri'] = $request->file('video_galeri')->store('public/galeri/video');
        }

        Galeri::create($data);

        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil ditambahkan');
    }
}
