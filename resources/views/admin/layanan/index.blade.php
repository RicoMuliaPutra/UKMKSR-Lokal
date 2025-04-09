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
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">
    @extends('admin.layout.navbar')

    @section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Layanan</h1>

        <!-- Layanan Terkini -->
        <div class="bg-white shadow-md rounded-lg p-4 mb-4">
            <h2 class="text-lg font-semibold mb-2">Layanan Terkini</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 p-2">No.</th>
                            <th class="border border-gray-300 p-2">Nama Layanan</th>
                            <th class="border border-gray-300 p-2">Tanggal Publikasi</th>
                            <th class="border border-gray-300 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($layanan as $key => $item)
                        @if ($item->status === 'aktif')
                        <tr class="text-center bg-gray-50 hover:bg-gray-100">
                            <td class="border border-gray-300 p-2">{{ $key+1 }}</td>
                            <td class="border border-gray-300 p-2">{{ $item->nama_layanan }}</td>
                            <td class="border border-gray-300 p-2">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td class="border border-gray-300 p-2 flex justify-center gap-2">
                                <a href="{{ route('layanan.show', $item->id_layanan) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-info-circle"></i></a>

                                <a href="{{ route('layanan.edit', $item->id_layanan) }}" class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('layanan.destroy', $item->id_layanan) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </form>

                                <form action="{{ route('layanan.toggle', $item->id_layanan) }}" method="POST">
                                    @csrf
                                    <input type="checkbox" onchange="this.form.submit()" checked>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @empty
                        <tr>
                            <td colspan="4" class="border border-gray-300 p-4 text-center text-gray-500 italic">
                                Tidak ada layanan terkini.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Daftar Layanan -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-lg font-semibold">Daftar Layanan</h2>
                <a href="{{ route('layanan.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition text-sm">
                    + Tambah
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 p-2">No.</th>
                            <th class="border border-gray-300 p-2">Nama Layanan</th>
                            <th class="border border-gray-300 p-2">Tanggal Publikasi</th>
                            <th class="border border-gray-300 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($daftarLayanan as $key => $item)
                        @if ($item->status === 'tidak')
                        <tr class="text-center bg-gray-50 hover:bg-gray-100">
                            <td class="border border-gray-300 p-2">{{ $key+1 }}</td>
                            <td class="border border-gray-300 p-2">{{ $item->nama_layanan }}</td>
                            <td class="border border-gray-300 p-2">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td class="border border-gray-300 p-2 flex justify-center gap-2">
                                <a href="{{ route('layanan.show', $item->id_layanan) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-info-circle"></i></a>

                                <a href="{{ route('layanan.edit', $item->id_layanan) }}" class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('layanan.destroy', $item->id_layanan) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </form>

                                <form action="{{ route('layanan.toggle', $item->id_layanan) }}" method="POST">
                                    @csrf
                                    <input type="checkbox" onchange="this.form.submit()">
                                </form>
                            </td>
                        </tr>
                        @endif
                        @empty
                        <tr>
                            <td colspan="4" class="border border-gray-300 p-4 text-center text-gray-500 italic">
                                Tidak ada daftar layanan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    @endsection
</body>

</html>