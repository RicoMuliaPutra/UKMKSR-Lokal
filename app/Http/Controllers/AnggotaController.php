<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class AnggotaController extends Controller
{
    public function index(){
        $anggotas = Anggota::latest()->get();
        return view('admin.anggota.index', compact('anggotas'));
    }


    public function create(){
        return view('admin.anggota.create_anggota');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required',
            'tanggal_lahir' => 'required|date',
            'angkatan' => 'required',
            'alasan_join' => 'required|string',
            'jurusan' => 'required|string',
            'prodi' => 'required|string',
            'tahun_masuk_kuliah' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('foto-anggota', 'public');
        }

        Anggota::create([
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'angkatan' => $request->input('angkatan'),
            'alasan_join' => $request->input('alasan_join'),
            'jurusan' => $request->input('jurusan'),
            'prodi' => $request->input('prodi'),
            'tahun_masuk_kuliah' => $request->input('tahun_masuk_kuliah'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'foto' => $imagePath,
            'alamat' => $request->input('alamat'),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil ditambahkan!');
    }
}
