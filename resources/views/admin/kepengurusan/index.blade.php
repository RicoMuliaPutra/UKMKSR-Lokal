<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>


    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="text-gray-800 bg-gray-100">
    @extends('admin.layout.navbar')
    @section('content')

    <div class="container mx-auto">
    <h1 class="mb-10 text-2xl font-bold">Struktur Kepengurusan</h1>
    <div class="flex flex-col gap-4 mb-4 md:flex-row md:items-center md:justify-between">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:space-x-2">

        </div>
        <!-- Tombol Dropdown -->
        <div x-data="{ openModal: false ,  openDivisi: false, openJabatan: false, openPeriode: false}">
            @include('admin.kepengurusan.create')
            @include('admin.devisi.create')
            @include('admin.pengurus_jabatan.create_Jabatan')
            @include('admin.pengurus_jabatan.create_priode')

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                type="button">Add Data
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
    <!-- Dropdown Menu -->
    <div id="dropdown" class="z-10 hidden bg-red-700 divide-y divide-gray-100 rounded-lg shadow-sm w-44">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="#" @click.prevent="openModal = true"
                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-red-500 dark:hover:text-white">Pengurus</a>
            </li>
 
            <li>
                <a href="#" @click.prevent="openDivisi = true"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-red-500 dark:hover:text-white">Divisi</a>
            </li>

            <li>
                <a href="#" @click.prevent="openJabatan = true"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-red-500 dark:hover:text-white">Jabatan</a>
            </li>

            <li>
                <a href="#" @click.prevent="openPeriode = true"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-red-500 dark:hover:text-white">Periode Kepengurusan</a>
            </li>

        </ul>
    </div>
    </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-black rtl:text-right">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Pengurus</th>
                    <th scope="col" class="px-6 py-3">Divisi</th>
                    <th scope="col" class="px-6 py-3">Jabatan</th>
                    <th scope="col" class="px-6 py-3">Periode Kepengurusan</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($pengurus as $index => $item)
                        <tr>
                            <td class="px-6 py-3">{{ $index + 1 }}</td>
                            <td class="px-6 py-3">{{ $item->anggota->nama }}</td>
                            <td class="px-6 py-3">{{ $item->jabatan->divisi->nama_divisi }}</td>
                            <td class="px-6 py-3">{{ $item->jabatan->nama_jabatan }}</td>
                            <td class="px-6 py-3">{{ $item->periode->nama_periode }}</td>
                            <td class="flex items-center px-6 py-3 space-x-3" x-data="{ openModal: false, detailUrl: '' }">
                                <a href="{{route('Kepengurusan.show', $item->id)}}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            <div x-data="{ openModal: false }">
                                <a href="{{route('Kepengurusan.edit', $item->id)}}" class="text-yellow-500 hover:text-yellow-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                            <form action="{{route('Kepengurusan.destroy', $item->id)}}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    </div>

    @endsection
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

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
</body>

</html>
