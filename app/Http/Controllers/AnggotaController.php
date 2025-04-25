<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class AnggotaController extends Controller
{

    public function index(Request $request)
    {
        $angkatan = $request->query('angkatan');
        $angkatanList = Anggota::select('angkatan')->distinct()->orderBy('angkatan', 'asc')->pluck('angkatan');
        $query = Anggota::query();
        if (!empty($angkatan)) {
            $query->where('angkatan', $angkatan);
        }
        $anggotas = $query->orderBy('angkatan', 'desc')->get();
        return view('admin.anggota.index', compact('anggotas', 'angkatanList'));
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
            'status' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string',
            'nilai_kehadiran' => 'nullable|numeric|min:0|max:100',
            'nilai_kontribusi' => 'nullable|numeric|min:0|max:100',
            'nilai_kompetensi' => 'nullable|numeric|min:0|max:100',
            'nilai_etika' => 'nullable|numeric|min:0|max:100',
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
            'status' => $request->input('status'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'foto' => $imagePath,
            'alamat' => $request->input('alamat'),
            'nilai_kehadiran' => $request->input('nilai_kehadiran', 0),
            'nilai_kontribusi' => $request->input('nilai_kontribusi', 0),
            'nilai_kompetensi' => $request->input('nilai_kompetensi', 0),
            'nilai_etika' => $request->input('nilai_etika', 0),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil ditambahkan!');
    }

    public function destroy($id) {
        $anggota = Anggota::findOrFail($id);
        if ($anggota->foto) {
            Storage::disk('public')->delete($anggota->foto);
        }
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Data Anggota berhasil dihapus');
    }

    public function edit($id){
        $anggota = anggota::findOrFail($id);
        return view ('admin.anggota.update_anggota', compact('anggota'));
    }

    public function update(Request $request, $id){
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
            'status' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string',
            'nilai_kehadiran' => 'nullable|numeric|min:0|max:100',
            'nilai_kontribusi' => 'nullable|numeric|min:0|max:100',
            'nilai_kompetensi' => 'nullable|numeric|min:0|max:100',
            'nilai_etika' => 'nullable|numeric|min:0|max:100',
        ]);

        $anggota = Anggota::findOrFail($id);

        if($request->hasFile('foto')){
            if($anggota->foto){
                Storage::disk('public')->delete($anggota->foto);
            }
            $anggota->foto = $request->file('foto')->store('foto-anggota', 'public');
        }
        $anggota->nama = $request->input('nama');
        $anggota->nim = $request->input('nim');
        $anggota->tanggal_lahir = $request->input('tanggal_lahir');
        $anggota->angkatan = $request->input('angkatan');
        $anggota->alasan_join = $request->input('alasan_join');
        $anggota->jurusan = $request->input('jurusan');
        $anggota->prodi = $request->input('prodi');
        $anggota->tahun_masuk_kuliah = $request->input('tahun_masuk_kuliah');
        $anggota->jenis_kelamin = $request->input('jenis_kelamin');
        $anggota->status = $request ->input('status');
        $anggota->alamat = $request->input('alamat');
        $anggota->nilai_kehadiran = $request->input('nilai_kehadiran');
        $anggota->nilai_kontribusi = $request->input('nilai_kontribusi');
        $anggota->nilai_kompetensi = $request->input('nilai_kompetensi');
        $anggota->nilai_etika = $request->input('nilai_etika');
        $anggota->save();

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui');
    }

    public function show($id){
    }

    public function search(Request $request){
    $query = $request->input('query');
    $angkatan = $request->input('angkatan');
    $angkatanList = Anggota::select('angkatan')->distinct()->orderBy('angkatan', 'asc')->pluck('angkatan');
    $anggotas = Anggota::query()
        ->when($query, function ($q) use ($query) {
            $q->where('nama', 'like', "%$query%")
              ->orWhere('nim', 'like', "%$query%");
        })
        ->when($angkatan, function ($q) use ($angkatan) {
            $q->where('angkatan', $angkatan);
        })
        ->orderBy('angkatan', 'desc')
        ->get();

    return view('admin.anggota.index', compact('anggotas', 'angkatanList'));
}

    public function dataAnggota(Request $request){
        $filterAngkatan = $request->query('angkatan');
        $daftarAngkatan = Anggota::select('angkatan')->distinct()->orderBy('angkatan', 'asc')->pluck('angkatan');

        $query = Anggota::query();
        if (!empty($filterAngkatan)) {
            $query->where('angkatan', $filterAngkatan);
        }
        $dataAnggota = $query->orderBy('angkatan', 'desc')->get();
        return view('LandingPage.anggota', compact('dataAnggota', 'daftarAngkatan'));
    }

    public function cari(Request $request){

        $searchTerm = $request->input('query');
        $selectedAngkatan = $request->input('angkatan');
        $daftarAngkatan = Anggota::select('angkatan')->distinct()->orderBy('angkatan', 'asc')->pluck('angkatan');

        $dataAnggota = Anggota::query()
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->where('nama', 'like', "%$searchTerm%")
                    ->orWhere('nim', 'like', "%$searchTerm%");
            })
            ->when($selectedAngkatan, function ($query) use ($selectedAngkatan) {
                $query->where('angkatan', $selectedAngkatan);
            })
            ->orderBy('angkatan', 'desc')
            ->get();

        return view('LandingPage.anggota', compact('dataAnggota', 'daftarAngkatan'));
    }

}
