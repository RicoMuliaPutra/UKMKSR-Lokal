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

<body class="bg-gray-100 text-gray-800">
    @extends('admin.layout.navbar')

    @section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Kegiatan</h1>

        <!-- Kegiatan Terkini (Hanya yang Aktif) -->
        <div class="bg-white shadow-md rounded-lg p-4 mb-4">
            <h2 class="text-lg font-semibold mb-2">Kegiatan Terkini</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 p-2">No.</th>
                            <th class="border border-gray-300 p-2">Nama Kegiatan</th>
                            <th class="border border-gray-300 p-2">Tanggal Publikasi</th>
                            <th class="border border-gray-300 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $key => $item)
                        @if ($item->status === 'aktif')
                        <tr class="text-center bg-gray-50 hover:bg-gray-100">
                            <td class="border border-gray-300 p-2">{{ $key+1 }}</td>
                            <td class="border border-gray-300 p-2">{{ $item->nama_kegiatan }}</td>
                            <td class="border border-gray-300 p-2">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td class="border border-gray-300 p-2 flex justify-center gap-2">
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
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-lg font-semibold">Daftar Kegiatan</h2>
                <a href="{{ route('kegiatan.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition text-sm">
                    + Tambah
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 p-2">No.</th>
                            <th class="border border-gray-300 p-2">Nama Kegiatan</th>
                            <th class="border border-gray-300 p-2">Tanggal Publikasi</th>
                            <th class="border border-gray-300 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftarKegiatan as $key => $item)
                        @if ($item->status === 'tidak')
                        <tr class="text-center bg-gray-50 hover:bg-gray-100">
                            <td class="border border-gray-300 p-2">{{ $key+1 }}</td>
                            <td class="border border-gray-300 p-2">{{ $item->nama_kegiatan }}</td>
                            <td class="border border-gray-300 p-2">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td class="border border-gray-300 p-2 flex justify-center gap-2">
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