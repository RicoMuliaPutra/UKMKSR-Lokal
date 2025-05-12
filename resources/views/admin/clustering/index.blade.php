<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clustering</title>
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
    <h1 class="text-2xl font-bold mb-2">Clustering</h1>
    <div class="container py-1 mx-auto">
    <div class="flex items-center justify-between mb-4">
        <p>Clustering Data Anggota Aktif KSR</p>
        <a href="/cluster"
            class="flex items-center justify-center px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
            Mulai Clustering Data
        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if($anggotas && $anggotas->count() > 0)
        <table class="w-full text-sm text-left text-black rtl:text-right">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">NIM</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Angkatan</th>
                    <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                    <th scope="col" class="px-6 py-3">Prodi</th>
                    <th scope="col" class="px-6 py-3">Nilai Kehadiran</th>
                    <th scope="col" class="px-6 py-3">Nilai Kontribusi</th>
                    <th scope="col" class="px-6 py-3">Nilai Kompetensi</th>
                    <th scope="col" class="px-6 py-3">Nilai Etika</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $key => $anggota)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 border-r">{{ $anggota->anggota->nim }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->anggota->nama }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->anggota->angkatan }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->anggota->jenis_kelamin }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->anggota->prodi }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->nilai_kehadiran }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->nilai_kontribusi }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->nilai_kompetensi }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->nilai_etika }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $anggotas->links() }}
        </div>
        @else
        <table class="w-full text-sm text-left text-black rtl:text-right">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">NIM</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Angkatan</th>
                    <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                    <th scope="col" class="px-6 py-3">Prodi</th>
                    <th scope="col" class="px-6 py-3">Nilai Kehadiran</th>
                    <th scope="col" class="px-6 py-3">Nilai Kontribusi</th>
                    <th scope="col" class="px-6 py-3">Nilai Kompetensi</th>
                    <th scope="col" class="px-6 py-3">Nilai Etika</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2 text-center" colspan="10">Tidak Ada Data Anggota</td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>
    </div>
    @endsection
</body>

</html>