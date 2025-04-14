@extends('admin.layout.navbar')

@section('content')
    <h1 class="mb-4 text-2xl font-bold">Hapus Layanan</h1>
    <p>Apakah Anda yakin ingin menghapus layanan <strong>{{ $layanan->nama_layanan }}</strong>?</p>

    <form action="{{ route('service.destroy', $layanan->id_layanan) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="px-4 py-2 mt-4 text-white bg-red-500 rounded">Ya, Hapus</button>
        <a href="{{ route('service.index') }}" class="px-4 py-2 mt-4 text-white bg-gray-500 rounded">Batal</a>
    </form>
@endsection
