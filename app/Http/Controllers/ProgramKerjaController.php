<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use App\Models\Anggota;
use App\Models\PeriodeKepengurusan;
use App\Models\Jabatan;
use App\Models\Divisi;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    public function index() {
        $jabatans = Jabatan::has('programKerja')->with(['programKerja', 'pengurus.anggota'])
            ->get();

        return view('admin.program_kerja.index', compact('jabatans'));
    }

    public function show($id) {
        $jabatan = Jabatan::with(['programKerja', 'pengurus.anggota'])->findOrFail($id);
        return view('admin.program_kerja.show', compact('jabatan'));
    }



    public function create(){
        $pengurus = Pengurus::with(['anggota', 'jabatan'])->get();
        return view('admin.program_kerja.create', compact( 'pengurus'));
    }


    public function store(Request $request) {
    $request->validate([
        'nama_program' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'jabatan_id' => 'required|exists:jabatan,id',
    ]);

    ProgramKerja::create([
        'nama_program' => $request->nama_program,
        'deskripsi' => $request->deskripsi,
        'jabatan_id' => $request->jabatan_id,
    ]);
    return redirect()->route('Program_kerja.index')->with('success', 'Program kerja berhasil ditambahkan.');

    }

    public function destroy($id){
    $program = ProgramKerja::findOrFail($id);
    $program->delete();

    return redirect()->route('Program_kerja.index')->with('success', 'Program kerja berhasil Dihapus.');
}


    public function viewpage(Request $request){
    $periodeId = $request->input('periode');
    $programQuery = ProgramKerja::with(['jabatan']);
    if ($periodeId) {
        $jabatanIds = Pengurus::where('periode_id', $periodeId)->pluck('jabatan_id')->unique();
        $programQuery->whereIn('jabatan_id', $jabatanIds);
    }

    $dataProgram = $programQuery->get()->groupBy(function ($item) {
        return $item->jabatan->nama_jabatan ?? 'Tidak Ada Jabatan';
    });

    $daftarPeriode = PeriodeKepengurusan::all();

    return view('LandingPage.program_kerja', compact('dataProgram', 'daftarPeriode'));
    }

}
