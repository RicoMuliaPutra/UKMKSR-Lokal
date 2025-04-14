<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::select('id_kegiatan', 'nama_kegiatan', 'created_at', 'status')
            ->where('status', 'aktif')
            ->latest()
            ->get();

        $daftarKegiatan = Kegiatan::select('id_kegiatan', 'nama_kegiatan', 'created_at', 'status')
            ->where('status', 'tidak')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.kegiatan.index', compact('kegiatan', 'daftarKegiatan'));
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.show', compact('kegiatan'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi_kegiatan' => 'nullable|string',
            'foto_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'poster_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $fotoPath = null;
        $posterPath = null;

        if ($request->hasFile('foto_kegiatan')) {
            $fotoFile = $request->file('foto_kegiatan');
            $fotoNama = time() . '_' . $fotoFile->getClientOriginalName();
            $fotoPath = $fotoFile->storeAs('kegiatan', $fotoNama, 'public');
        }

        if ($request->hasFile('poster_kegiatan')) {
            $posterFile = $request->file('poster_kegiatan');
            $posterNama = time() . '_' . $posterFile->getClientOriginalName();
            $posterPath = $posterFile->storeAs('kegiatan', $posterNama, 'public');
        }

        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'foto_kegiatan' => $fotoPath,
            'poster_kegiatan' => $posterPath,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi_kegiatan' => 'nullable|string',
            'foto_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'poster_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->deskripsi_kegiatan = $request->deskripsi_kegiatan;
        if ($request->hasFile('foto_kegiatan')) {

            if ($kegiatan->foto_kegiatan) {
                Storage::delete('public/' . $kegiatan->foto_kegiatan);
            }
            $fotoPath = $request->file('foto_kegiatan')->store('kegiatan/foto', 'public');
            $kegiatan->foto_kegiatan = $fotoPath;
        }

        if ($request->hasFile('poster_kegiatan')) {
            if ($kegiatan->poster_kegiatan) {
                Storage::delete('public/' . $kegiatan->poster_kegiatan);
            }
            $posterPath = $request->file('poster_kegiatan')->store('kegiatan/poster', 'public');
            $kegiatan->poster_kegiatan = $posterPath;
        }

        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Kegiatan::destroy($id);
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus!');
    }

    public function toggle($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->status = $kegiatan->status === 'aktif' ? 'tidak' : 'aktif';
        $kegiatan->save();

        return back()->with('success', 'Status kegiatan berhasil diperbarui.');
    }
}
