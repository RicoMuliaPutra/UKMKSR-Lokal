<?php

namespace App\Http\Controllers;

use App\Models\DataNilai;
use App\Models\Anggota;
use Illuminate\Http\Request;

class DataNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $search = $request->input('search');
        $data_nilais = DataNilai::getDataNilai($search);

        return view('admin.data_nilai.index', [
            'title'=>'Data Nilai Anggota',
            'data_nilais'=> $data_nilais
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggotaYangSudahDinilai = DataNilai::pluck('anggota_id')->toArray();
    
        $anggotas = Anggota::where('status', 'aktif')
            ->whereNotIn('id', $anggotaYangSudahDinilai)
            ->get();
    
        return view('admin.data_nilai.create_data_nilai', compact('anggotas'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:anggota,id',
            'nilai_kehadiran' => 'required|numeric',
            'nilai_kontribusi' => 'required|numeric',
            'nilai_kompetensi' => 'required|numeric',
            'nilai_etika' => 'required|numeric',
        ]);

        DataNilai::create([
            'anggota_id' => $request->id,
            'nilai_kehadiran' => $request->nilai_kehadiran,
            'nilai_kontribusi' => $request->nilai_kontribusi,
            'nilai_kompetensi' => $request->nilai_kompetensi,
            'nilai_etika' => $request->nilai_etika,
        ]);

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_nilais = DataNilai::with('anggota')->findOrFail($id);
        return view('admin.data_nilai.detail_data_nilai_anggota', [
            'title'=>'Detail Data Nilai Anggota',
            'data_nilais'=> $data_nilais
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_nilais = DataNilai::with('anggota')->findOrFail($id);
        return view('admin.data_nilai.update_data_nilai_anggota', [
            'title'=>'Edit Data Nilai Anggota',
            'data_nilais'=> $data_nilais
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id' => 'required|exists:anggota,id',
            'nilai_kehadiran' => 'required|numeric',
            'nilai_kontribusi' => 'required|numeric',
            'nilai_kompetensi' => 'required|numeric',
            'nilai_etika' => 'required|numeric',
        ]);

        $data_nilais = DataNilai::findOrFail($id);

        $data_nilais->anggota_id = $request->input('id');
        $data_nilais->nilai_kehadiran = $request->input('nilai_kehadiran');
        $data_nilais->nilai_kontribusi = $request->input('nilai_kontribusi');
        $data_nilais->nilai_kompetensi = $request->input('nilai_kompetensi');
        $data_nilais->nilai_etika = $request->input('nilai_etika');
        $data_nilais->save();

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_nilai = DataNilai::findOrFail($id);

        $data_nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Data nilai anggota berhasil dihapus');
    }
}
