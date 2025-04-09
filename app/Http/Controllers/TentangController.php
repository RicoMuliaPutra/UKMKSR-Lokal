<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $data = Tentang::all();
        return view('admin.tentang.index', compact('data'));
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
}
