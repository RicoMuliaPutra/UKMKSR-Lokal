@extends('admin.layout.navbar')

@section('content')
<h1 class="text-2xl font-bold mb-4">Ubah Status Layanan</h1>
<p>Apakah Anda ingin mengubah status layanan <strong>{{ $layanan->nama_layanan }}</strong> menjadi <strong>{{ $layanan->status === 'aktif' ? 'tidak aktif' : 'aktif' }}</strong>?</p>

<form action="{{ route('layanan.toggle-status', $kegiatan->id_kegiatan) }}" method="GET">
    <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-4 rounded">Ya, Ubah Status</button>
    <a href="{{ route('layanan.index') }}" class="bg-gray-500 text-white px-4 py-2 mt-4 rounded">Batal</a>
</form>
@endsection