<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LayananPageController extends Controller
{
    public function layananPage(){
        $layanans = Layanan::where('status', 'aktif')->get();
        return view('LandingPage.layanan', compact('layanans'));
    }

    public function layananSiaga(){
        return view('LandingPage.layananSiaga');
    }


    public function layananFacilitator(){
        return view ("LandingPage.Facilitator");
    }

    public function index() {
        $layanan = Layanan::latest()->get();
        return view('admin.layananKSR.index', compact('layanan'));
    }


    public function create(){
        return view ('admin.layananKSR.create');
    }

    public function store(Request $request){
    $request->validate([
        'nama_layanan' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:255',
        'foto_layanan'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'poster_layanan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $fotoPath = null;
    if ($request->hasFile('foto_layanan')) {
        $fotoFile = $request->file('foto_layanan');
        $fotoNama = uniqid() . '_' . $fotoFile->getClientOriginalName();
        $fotoFile->move(public_path('layanan'), $fotoNama);
        $fotoPath = 'layanan/' . $fotoNama;
    }

    $posterPath = null;
    if ($request->hasFile('poster_layanan')) {
        $posterFile = $request->file('poster_layanan');
        $posterNama = uniqid() . '_' . $posterFile->getClientOriginalName();
        $posterFile->move(public_path('layanan'), $posterNama);
        $posterPath = 'layanan/' . $posterNama;
    }

    Layanan::create([
        'nama_layanan' => $request->nama_layanan,
        'deskripsi' => $request->deskripsi,
        'foto_layanan' => $fotoPath,
        'poster_layanan' => $posterPath,
        'status' => 'Aktif',
    ]);

    return redirect()->route('service.index')->with('success', 'Layanan KSR berhasil ditambahkan');
}

    public function edit($id){
        $layanan = layanan::findOrFail($id);
        return view ('admin.layananKSR.update', compact('layanan'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama_layanan' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:255',
        'foto_layanan'=> 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'poster_layanan' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $layanan = Layanan::findOrFail($id);
    $layanan->nama_layanan = $request->nama_layanan;
    $layanan->deskripsi = $request->deskripsi;

    if ($request->hasFile('foto_layanan')) {
        if ($layanan->foto_layanan) {
            File::delete(public_path($layanan->foto_layanan));
        }
        $fotoFile = $request->file('foto_layanan');
        $fotoNama = uniqid() . '_' . $fotoFile->getClientOriginalName();
        $fotoFile->move(public_path('layanan'), $fotoNama);
        $layanan->foto_layanan = 'layanan/' . $fotoNama;
    }

    if ($request->hasFile('poster_layanan')) {
        if ($layanan->poster_layanan) {
            File::delete(public_path($layanan->poster_layanan));
        }
        $posterFile = $request->file('poster_layanan');
        $posterNama = uniqid() . '_' . $posterFile->getClientOriginalName();
        $posterFile->move(public_path('layanan'), $posterNama);
        $layanan->poster_layanan = 'layanan/' . $posterNama;
    }

    $layanan->save();

    return redirect()->route('service.index')->with('success', 'Layanan berhasil diperbarui');
}


}
