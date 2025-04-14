<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    
    @extends('admin.layout.navbar')

    @section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Edit Layanan</h1>

        <form action="{{ route('layanan.update', $layanan->id_layanan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block font-semibold">Nama Layanan:</label>
            <input type="text" name="nama_layanan" value="{{ $layanan->nama_layanan }}" class="border p-2 w-full rounded" required>

            <label class="block font-semibold mt-3">Deskripsi:</label>
            <textarea name="deskripsi_layanan" class="border p-2 w-full rounded" id="summernote">{{ $layanan->deskripsi_layanan }}</textarea>

            <label class="block font-semibold mt-3">Foto:</label>
            <input type="file" name="foto_layanan" class="border p-2 w-full rounded">
            @if ($layanan->foto_layanan)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $layanan->foto_layanan) }}" class="w-32 h-32 object-cover rounded" alt="Foto Layanan">
                </div>
            @endif

            <label class="block font-semibold mt-3">Poster:</label>
            <input type="file" name="poster_kegiatan" class="border p-2 w-full rounded">
            @if ($layanan->poster_layanan)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $layanan->poster_layanan) }}" class="w-32 h-32 object-cover rounded" alt="Poster Kegiatan">
                </div>
            @endif

            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('layanan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>

    @endsection

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 150, 
                placeholder: 'Deskripsi Layanan...',
            });
        });
    </script>
</body>
</html>
