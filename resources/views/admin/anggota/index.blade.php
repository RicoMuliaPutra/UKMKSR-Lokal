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
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="text-gray-800 bg-gray-100">
    @extends('admin.layout.navbar')

    @section('content')
    <h1 class="mb-4 text-2xl font-bold">Anggota KSR</h1>
    <div class="container py-8 mx-auto">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-2">
                <input type="text" id="search" placeholder="Cari..." class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                <select id="filter" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Filter</option>
                    <option value="terbaru">Terbaru</option>
                    <option value="terlama">Terlama</option>
                    <option value="populer">Populer</option>
                </select>
            </div>

            <a href="{{route('anggota.create')}}" class="flex items-center px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah
            </a>
        </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-black rtl:text-right">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">NIM</th>
                    <th scope="col" class="px-6 py-3">Tanggal lahir</th>
                    <th scope="col" class="px-6 py-3">Angkatan</th>
                    <th scope="col" class="px-6 py-3">Jk</th>
                    <th scope="col" class="px-6 py-3">alamat</th>
                    <th scope="col" class="px-6 py-3">Jurusan</th>
                    <th scope="col" class="px-6 py-3">prodi</th>
                    <th scope="col" class="px-6 py-3">tahun masuk kuliah</th>
                    <th scope="col" class="px-6 py-3">Alasan bergabung</th>
                    <th scope="col" class="px-6 py-3">Foto</th>
                    <th scope="col" class="px-6 py-3">Action</th>
               </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $key => $anggota )
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2 text-center border-r">{{ $key + 1 }}</td>
                    <td class="px-4 py-2 border-r">{{ $anggota->nama }}</td>
                    <td class="px-4 py-2 border-r">{{ $anggota->nim }}</td>
                    <td class="px-4 py-2 border-r">{{ $anggota->tanggal_lahir }}</td>
                    <td class="px-4 py-2 border-r">{{ $anggota->angkatan }}</td>
                    <td class="px-4 py-2 border-r">{{ $anggota->jenis_kelamin }}</td>
                    <td class="px-4 py-2 border-r">{{ $anggota->alamat }}</td>
                    <td class="px-4 py-2 border-r">{{ $anggota->jurusan }}</td>
                    <td class="px-4 py-2 border-r">{{ $anggota->prodi }}</td>
                    <td class="px-4 py-2 border-r">{{ $anggota->tahun_masuk_kuliah }}</td>
                    <td class="px-4 py-2 border-r">{{ $anggota->alasan_join }}</td>
                    <td class="px-4 py-2 text-center border-r">
                        @if ($anggota->foto)
                            <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Gambar Blog" class="object-cover w-20 h-20 rounded">
                        @else
                            <span>-</span>
                        @endif
                        <td class="flex items-center justify-center px-4 py-2 space-x-2">
                                <a href="" class="flex items-center px-2 py-1 text-white bg-yellow-400 rounded hover:bg-yellow-500">Edit</a>
                                <form action="" method="POST" onsubmit="return confirm('Yakin ingin menghapus blog ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600">Hapus</button>
                                </form>
                        </td>
                    </td>











                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
