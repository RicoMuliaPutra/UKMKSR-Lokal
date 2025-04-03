@extends('admin.layout.navbar')

@section('content')
<h1 class="text-2xl font-bold mb-4">Ubah Status Kegiatan</h1>
<p>Apakah Anda ingin mengubah status kegiatan <strong>{{ $kegiatan->nama_kegiatan }}</strong> menjadi <strong>{{ $kegiatan->status === 'aktif' ? 'tidak aktif' : 'aktif' }}</strong>?</p>

<form action="{{ route('kegiatan.toggle-status', $kegiatan->id_kegiatan) }}" method="GET">
    <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-4 rounded">Ya, Ubah Status</button>
    <a href="{{ route('kegiatan.index') }}" class="bg-gray-500 text-white px-4 py-2 mt-4 rounded">Batal</a>
</form>
@endsection