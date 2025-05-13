
    @extends('admin.layout.navbar')

    @section('content')
    <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Detail Layanan</h1>

        <p><strong>Nama Layanan:</strong> {{ $layanan->nama_layanan }}</p>

        <p><strong>Deskripsi:</strong></p>
        <p class="py-2 whitespace-pre-line">{!!($layanan->deskripsi_layanan)!!}</p>

        @if ($layanan->foto_layanan)
        <div class="mt-4">
            <img src="{{ asset('storage/' . $layanan->foto_layanan) }}" class="object-cover w-32 h-32 rounded" alt="Foto Layanan">
        </div>
        @endif

        <div class="flex justify-end gap-4 mt-4">
            <a href="{{ route('service.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded">Kembali</a>
            <a href="{{ route('service.edit', $layanan->id_layanan) }}" class="px-4 py-2 text-white bg-yellow-500 rounded">Edit</a>
        </div>
    </div>
    @endsection
