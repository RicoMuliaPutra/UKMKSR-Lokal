<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan</title>
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
    <div class="container mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Kegiatan</h1>

        <!-- Kegiatan Terkini (Hanya yang Aktif) -->
        <div class="p-4 mb-4 bg-white rounded-lg shadow-md">
            <h2 class="mb-2 text-lg font-semibold">Kegiatan Terkini</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border border-collapse border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-2 border border-gray-300">No.</th>
                            <th class="p-2 border border-gray-300">Nama Kegiatan</th>
                            <th class="p-2 border border-gray-300">Tanggal Publikasi</th>
                            <th class="p-2 border border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $key => $item)
                        @if ($item->status === 'aktif')
                        <tr class="text-center bg-gray-50 hover:bg-gray-100">
                            <td class="p-2 border border-gray-300">{{ $key+1 }}</td>
                            <td class="p-2 border border-gray-300">{{ $item->nama_kegiatan }}</td>
                            <td class="p-2 border border-gray-300">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td class="flex justify-center gap-2 p-2 border border-gray-300">
                                <!-- Tombol Lihat -->
                                <a href="{{ route('kegiatan.show', $item->id_kegiatan) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-info-circle"></i></a>

                                <!-- Tombol Edit -->
                                <a href="{{ route('kegiatan.edit', $item->id_kegiatan) }}" class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-edit"></i></a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('kegiatan.destroy', $item->id_kegiatan) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </form>

                                <!-- Checkbox Aktif (Tercentang) -->
                                <form action="{{ route('kegiatan.toggle', $item->id_kegiatan) }}" method="POST">
                                    @csrf
                                    <input type="checkbox" onchange="this.form.submit()" checked>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Daftar Kegiatan (Hanya yang Tidak Aktif) -->
        <div class="p-4 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-lg font-semibold">Daftar Kegiatan</h2>
                <a href="{{ route('kegiatan.create') }}"
                    class="px-3 py-1 text-sm text-white transition bg-blue-500 rounded hover:bg-blue-600">
                    + Tambah
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border border-collapse border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-2 border border-gray-300">No.</th>
                            <th class="p-2 border border-gray-300">Nama Kegiatan</th>
                            <th class="p-2 border border-gray-300">Tanggal Publikasi</th>
                            <th class="p-2 border border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftarKegiatan as $key => $item)
                        @if ($item->status === 'tidak')
                        <tr class="text-center bg-gray-50 hover:bg-gray-100">
                            <td class="p-2 border border-gray-300">{{ $key+1 }}</td>
                            <td class="p-2 border border-gray-300">{{ $item->nama_kegiatan }}</td>
                            <td class="p-2 border border-gray-300">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td class="flex justify-center gap-2 p-2 border border-gray-300">
                                <!-- Tombol Lihat -->
                                <a href="{{ route('kegiatan.show', $item->id_kegiatan) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-info-circle"></i></a>

                                <!-- Tombol Edit -->
                                <a href="{{ route('kegiatan.edit', $item->id_kegiatan) }}" class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-edit"></i></a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('kegiatan.destroy', $item->id_kegiatan) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </form>

                                <!-- Checkbox Tidak Aktif (Uncheck) -->
                                <form action="{{ route('kegiatan.toggle', $item->id_kegiatan) }}" method="POST">
                                    @csrf
                                    <input type="checkbox" onchange="this.form.submit()">
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    @endsection
</body>

</html>


