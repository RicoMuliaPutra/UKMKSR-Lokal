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
<div class="max-w-6xl px-4 py-5 mx-auto">
    <!-- Judul Halaman -->
    <div class="mb-8 text-center">
        <div class="py-4 text-xl font-bold text-white shadow-lg bg-gradient-to-r from-red-600 to-red-300 rounded-2xl">
            Struktur Kepengurusan
        </div>
    </div>

    <div class="p-6 mt-10 bg-white shadow-xl rounded-2xl">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-700">Kepengurusan</h2>

            <div x-data="{ openModal: false, openDivisi: false, openJabatan: false, openPeriode: false }" class="relative">
                @include('admin.kepengurusan.create')
                @include('admin.devisi.create')
                @include('admin.pengurus_jabatan.create_Jabatan')
                @include('admin.pengurus_jabatan.create_priode')

                <!-- Tombol Add Data -->
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="flex items-center px-5 py-2.5 text-sm font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                    type="button">
                    Add Data
                    <svg class="w-2.5 h-2.5 ms-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdown"
                    class="absolute z-10 hidden mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-red-700">
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

        <!-- Tabel Kepengurusan -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="font-semibold text-gray-700 bg-gray-200">
                    <tr>
                        <th class="px-6 py-3">No.</th>
                        <th class="px-6 py-3">Nama Pengurus</th>
                        <th class="px-6 py-3">Jabatan</th>
                        <th class="px-6 py-3">Periode Kepengurusan</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($pengurus as $index => $item)
                        <tr>
                            <td class="px-6 py-3">{{ $index + 1 }}</td>
                            <td class="px-6 py-3">{{ $item->anggota->nama }}</td>
                            {{-- <td class="px-6 py-3">{{ $item->jabatan->divisi->nama_divisi }}</td> --}}
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
</div>
</body></html>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success") }}',
            confirmButtonText: 'OK'
        });
        @endif
    </script>
</div>
@endsection










