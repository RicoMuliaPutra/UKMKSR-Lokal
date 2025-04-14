<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Layanan</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

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
        <h1 class="text-2xl font-bold mb-4">Detail Layanan</h1>

        <p><strong>Nama Layanan:</strong> {{ $layanan->nama_layanan }}</p>

        <p><strong>Deskripsi:</strong></p>
        <p class="whitespace-pre-line">{{ nl2br(e($layanan->deskripsi_layanan)) }}</p>

        @if ($layanan->foto_layanan)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $layanan->foto_layanan) }}" class="w-32 h-32 object-cover rounded" alt="Foto Layanan">
        </div>
        @endif

        <div class="mt-4 flex gap-4 justify-end">
            <a href="{{ route('layanan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            <a href="{{ route('layanan.edit', $layanan->id_layanan) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
        </div>
    </div>
    @endsection
</body>

</html>