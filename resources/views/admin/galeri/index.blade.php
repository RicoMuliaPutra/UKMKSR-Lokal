<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">
    @extends('admin.layout.navbar')

    @section('content')
    <div class="max-w-7xl mx-auto py-5 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Galeri</h1>
            <select class="border border-gray-300 rounded px-2 py-1 text-sm">
                <option value="">Tambah</option>
                <option value="foto">Tambah Foto</option>
                <option value="video">Tambah Video</option>
            </select>
        </div>

        {{-- Filter Tab --}}
        <div class="mb-6 border-b border-gray-300">
            <nav class="flex space-x-6 text-sm font-semibold">
                <a href="?tipe=semua"
                    class="pb-2 transition-all duration-200 border-b-2 {{ $tipe === 'semua' ? 'border-red-600 text-red-600' : 'border-transparent text-gray-600 hover:border-red-300 hover:text-red-500' }}">
                    Semua
                </a>
                <a href="?tipe=foto"
                    class="pb-2 transition-all duration-200 border-b-2 {{ $tipe === 'foto' ? 'border-red-600 text-red-600' : 'border-transparent text-gray-600 hover:border-red-300 hover:text-red-500' }}">
                    Foto
                </a>
                <a href="?tipe=video"
                    class="pb-2 transition-all duration-200 border-b-2 {{ $tipe === 'video' ? 'border-red-600 text-red-600' : 'border-transparent text-gray-600 hover:border-red-300 hover:text-red-500' }}">
                    Video
                </a>
            </nav>
        </div>

        {{-- Grid Galeri --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 justify-items-center">
            @foreach ($galeri as $item)
            <div class="bg-gray-300 rounded-md w-full aspect-[2/1] overflow-hidden shadow">
                @if ($item['tipe'] === 'gambar')
                <img src="{{ $item['path'] }}" class="w-full h-full object-cover" alt="Foto Galeri">
                @elseif ($item['tipe'] === 'video')
                <video controls class="w-full h-full object-cover">
                    <source src="{{ $item['path'] }}" type="video/mp4">
                    Browser tidak mendukung tag video.
                </video>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endsection
</body>

</html>