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
        // Validasi input
        $request->validate([
            'id_jenis_galeri' => 'required|in:1,2', // Validasi nilai 1 atau 2 untuk jenis galeri
            'foto_galeri' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'video_galeri' => 'nullable|mimes:mp4,mkv,avi',
            'status' => 'required|in:aktif,tidak',
        ]);

        // Ambil data selain foto dan video
        $data = $request->only(['id_jenis_galeri', 'status']);

        // Menyimpan foto jika ada
        if ($request->hasFile('foto_galeri')) {
            $fotoPath = $request->file('foto_galeri')->store('galeri/foto', 'public');
            $data['foto_galeri'] = $fotoPath;  // Simpan path relatif
        }

        // Menyimpan video jika ada
        if ($request->hasFile('video_galeri')) {
            $videoPath = $request->file('video_galeri')->store('galeri/video', 'public');
            $data['video_galeri'] = $videoPath;  // Simpan path relatif
        }

        // Simpan data galeri ke database
        Galeri::create($data);

        // Redirect ke halaman galeri dengan pesan sukses
        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil ditambahkan');
    }
}
