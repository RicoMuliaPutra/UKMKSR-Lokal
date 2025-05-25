<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang;
use App\Models\Info;
use App\Models\VisiMisi;
use App\Models\Sejarah;
//yailah

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::all();
        $info = Info::all();
        $sejarah = Sejarah::all();
        $visimisi = VisiMisi::all();

        return view('admin.tentang.index', compact('tentang', 'info', 'sejarah', 'visimisi'));
    }

    public function create()
    {
        return view('admin.tentang.create');
    }

    public function store(Request $request)
    {
        $request->validate(['deskripsi_ksr' => 'required']);
        Tentang::create($request->all());
        return redirect()->route('tentang.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Tentang::findOrFail($id);
        return view('admin.tentang.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Tentang::findOrFail($id);
        return view('admin.tentang.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Tentang::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('tentang.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        Tentang::destroy($id);
        return back()->with('success', 'Data berhasil dihapus');
    }

    ///////////// Function landingPage //////////////
    public function lambang()
    {
        $lambang = tentang::latest()->first();
        return view('LandingPage.lambang', compact('lambang'));
    }

    public function sejarah()
    {
        $sejarah = Sejarah::latest()->first();
        return view('LandingPage.sejarah', compact('sejarah'));
    }

    public function visimisi()
    {
        $visimisi = Visimisi::latest()->first();
        return view('LandingPage.visimisi', compact('visimisi'));
    }
}
