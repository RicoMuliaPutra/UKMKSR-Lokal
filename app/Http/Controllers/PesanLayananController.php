<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesanLayanan;
use App\Models\Layanan;




class PesanLayananController extends Controller
{

    public function index(){
        $pesanan = PesanLayanan::with('layanan')->latest()->get();
        $layanan = Layanan::all();
        return view('admin.permohonan.index', compact('pesanan', 'layanan'));
    }

    public function create(){
        $layanans = Layanan::where('status', 'aktif')->get();
        return view('LandingPage.PesanLayanan', compact('layanans'));
    }

    public function store(Request $request){
    $request->validate([
        'id_layanan' => 'required|exists:layanan,id_layanan',
        'nama' => 'required|string|max:255',
        'asal' => 'required|string|max:255',
        'nama_kegiatan' => 'required|string|max:255',
        'surat_sph' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
    ]);

    $path = null;
    if ($request->hasFile('surat_sph')) {
        $path = $request->file('surat_sph')->store('surat-sph', 'public');
    }


    PesanLayanan::create([
        'id_layanan' => $request->id_layanan,
        'nama' => $request->nama,
        'asal' => $request->asal,
        'nama_kegiatan' => $request->nama_kegiatan,
        'surat_sph' => $path,
    ]);

    return redirect()->back()->with('success', 'Permohonan berhasil dikirim!');

}

}
