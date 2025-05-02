<?php

namespace App\Http\Controllers;
use App\Models\Pengurus;
use App\Models\Anggota;
use App\Models\PeriodeKepengurusan;
use App\Models\Jabatan;
use App\Models\Divisi;
use Illuminate\Http\Request;

class pengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::with('anggota', 'jabatan.divisi', 'periode', 'pengurusProgramKerjas.programKerja')->get();
        $anggota = Anggota::all();
        $periode = PeriodeKepengurusan::all();
        $jabatan = Jabatan::with('divisi')->get();
        $divisi = Divisi::all(); 
        return view('admin.kepengurusan.index', compact('pengurus','anggota', 'periode', 'divisi','jabatan'));
    }


    public function store(Request $request){
        $request->validate([
            'anggota_id' => 'required|exists:anggota,id',
            'jabatan_id' => 'required|exists:jabatan,id',
            'periode_id' => 'required|exists:periode_kepengurusan,id', // ✅ sesuai dengan nama tabel kamu

        ]);

        Pengurus::create([
            'anggota_id' => $request->anggota_id,
            'jabatan_id' => $request->jabatan_id,
            'periode_id' => $request->periode_id,
        ]);

        return redirect()->back()->with('success', 'Data pengurus berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = Pengurus::findOrFail($id);

        $anggota = Anggota::all();
        $jabatan = Jabatan::with('divisi')->get();
        $periode = PeriodeKepengurusan::all();

        return view('admin.kepengurusan.update', compact('item', 'anggota', 'jabatan', 'periode'));
    }

    public function update(Request $request, $id) {
        $pengurus = Pengurus::findOrFail($id);
        $pengurus->update([
            'anggota_id' => $request->anggota_id,
            'jabatan_id' => $request->jabatan_id,
            'periode_id' => $request->periode_id,
        ]);

        return redirect()->route('Kepengurusan.index')->with('success', 'Data berhasil diperbarui!');

    }

    public function destroy($id){

        $pengurus = Pengurus::findOrFail($id);
        $pengurus->programKerjas()->detach();
        $pengurus->pengurusProgramKerjas()->delete();
        $pengurus->delete();
        return redirect()->back()->with('success', 'Data pengurus berhasil dihapus.');
    }

    public function show($id)
    {
        $pengurus = Pengurus::with(['anggota', 'jabatan.divisi', 'periode'])->findOrFail($id);
        return view('admin.kepengurusan.show', compact('pengurus'));
    }



    /////////
    public function tampilanblade() {
        $pengurus = Pengurus::with('anggota', 'jabatan.divisi', 'periode', 'pengurusProgramKerjas.programKerja')->get();
        return view('LandingPage.kepengurusan', compact('pengurus'));
    }





}
