<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {font-family: 'Poppins', sans-serif;}
    </style>
</head>

<body class="text-gray-800 bg-gray-100">
    @extends('admin.layout.navbar')

    @section('content')
    <h1 class="mb-4 text-2xl font-bold">Layanan</h1>
    <div class="container py-8 mx-auto">
        <div class="flex flex-col gap-4 mb-4 md:flex-row md:items-center md:justify-between">
            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:space-x-2"></div>
            <a href="{{ route('service.create') }}"
                class="flex items-center justify-center w-full px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 md:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah
            </a>
        </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h2 class="mb-2 text-lg font-semibold">Layanan Terkini</h2>
        <table class="w-full text-sm text-left text-black rtl:text-right">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Layanan</th>
                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                    <th scope="col" class="px-6 py-3">Foto Layanan</th>
                    <th scope="col" class="px-6 py-3">Poster</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($layanan as $key => $item)
                @if($item ->status === 'aktif')
                <tr class="border-b hover:bg-gray-50" >
                    <td class="px-4 py-2 text-center border-r">{{ $key + 1 }}</td>
                    <td class="px-4 py-2 border-r">{{ $item->nama_layanan }}</td>
                    <td class="px-4 py-2 border-r">{!! $item->deskripsi !!}</td>
                    <td class="px-4 py-2 text-center border-r">
                        @if ($item->foto_layanan)
                            <img src="{{ asset($item->foto_layanan) }}" alt="foto layanan" class="object-cover w-20 h-20 rounded cursor-pointer" onclick="showImage('{{asset($item->foto_layanan)}}')">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center border-r ">
                        @if ($item->poster_layanan)
                        <img src="{{ asset($item->poster_layanan) }}" alt="poster layanan" class="object-cover w-24 h-24 rounded cursor-pointer" onclick="showImage('{{asset($item->poster_layanan)}}')">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td class="flex items-center justify-center px-4 py-2 space-x-2">
                        <a href="" class="text-blue-500 hover:text-blue-700"><i class="fas fa-info-circle"></i></a>
                        <a href="{{route('service.edit' , $item->id)}}" class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-edit"></i> </a>
                        <form action="" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                        </form>
                        <form action="" method="POST">
                            @csrf
                            <input type="checkbox" onchange="this.form.submit()">
                        </form>

                    </td>
                        @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="relative mt-10 overflow-x-auto shadow-md sm:rounded-lg">
        <h2 class="mb-2 text-lg font-semibold">Layanan Non Aktif</h2>
        <table class="w-full text-sm text-left text-black rtl:text-right">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Layanan</th>
                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                    <th scope="col" class="px-6 py-3">Foto Layanan</th>
                    <th scope="col" class="px-6 py-3">Poster</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    </div>

    @endsection
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showImage(imageUrl) {
            Swal.fire({
                imageUrl: imageUrl,
                imageWidth: 'auto',
                imageHeight: 'auto',
                imageAlt: 'Detail Foto',
                showConfirmButton: false,
                backdrop: true
            });
        }
    </script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
</body>
</html>

