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
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="text-gray-800 bg-gray-100">
    @extends('admin.layout.navbar')

    @section('content')
    <div class="px-4 py-5 mx-auto max-w-7xl">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Galeri</h1>
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">Add Data <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
                </button>
                <div id="dropdown" class="z-10 hidden bg-red-700 divide-y divide-gray-100 rounded-lg shadow-sm w-44 ">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                      <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-red-500 dark:hover:text-white">Tambah Foto</a>
                      </li>
                      <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-red-500 dark:hover:text-white">Tambah Vidio</a>
                      </li>
                    </ul>
            </div>
        </div>
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
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-4 justify-items-center">
            @foreach ($galeri as $item)
            <div class="bg-gray-300 rounded-md w-full aspect-[2/1] overflow-hidden shadow">
                @if ($item['tipe'] === 'gambar')
                <img src="{{ $item['path'] }}" class="object-cover w-full h-full" alt="Foto Galeri">
                @elseif ($item['tipe'] === 'video')
                <video controls class="object-cover w-full h-full">
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
