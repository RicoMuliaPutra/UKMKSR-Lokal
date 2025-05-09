@extends('admin.layout.navbar')

@section('content')

<body class="text-gray-800 bg-gray-100">
    <div class="px-4 py-5 mx-auto max-w-7xl">
        <h1 class="text-2xl font-bold">Tambah Galeri</h1>
        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="id_jenis_galeri" class="block text-sm font-semibold">Jenis Galeri</label>
                <select id="id_jenis_galeri" name="id_jenis_galeri" class="w-full p-2 border border-gray-300 rounded">
                    @foreach ($jenisGaleri as $jenis)
                    <option value="{{ $jenis->id_jenis_galeri }}">{{ $jenis->nama_jenis_galeri }}</option>
                    @endforeach
                </select>
            </div>

            @if($tipe === 'foto')
            <div class="mb-4">
                <label for="foto_galeri" class="block text-sm font-semibold">Foto Galeri</label>
                <input type="file" id="foto_galeri" name="foto_galeri" class="w-full p-2 border border-gray-300 rounded">
            </div>
            @elseif($tipe === 'video')
            <div class="mb-4">
                <label for="video_galeri" class="block text-sm font-semibold">Video Galeri</label>
                <input type="file" id="video_galeri" name="video_galeri" class="w-full p-2 border border-gray-300 rounded">
            </div>
            @endif

            <div class="mb-4">
                <label for="status" class="block text-sm font-semibold">Status</label>
                <select id="status" name="status" class="w-full p-2 border border-gray-300 rounded">
                    <option value="aktif">Aktif</option>
                    <option value="tidak">Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        </form>
    </div>
</body>
@endsection