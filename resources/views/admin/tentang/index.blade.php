<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang</title>
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
        <h1 class="text-2xl font-bold mb-4">Tentang</h1>

        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Tentang UKM KSR</h2>
                <a href="{{ route('tentang.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition text-sm">
                    + Tambah
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 p-2">No.</th>
                            <th class="border border-gray-300 p-2">Deskripsi</th>
                            <th class="border border-gray-300 p-2">Tanggal Publikasi</th>
                            <th class="border border-gray-300 p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $i => $item)
                        <tr class="text-center bg-gray-50 hover:bg-gray-100">
                            <td class="border border-gray-300 p-2">{{ $i + 1 }}</td>
                            <td class="border border-gray-300 p-2 text-left">{{ Str::limit($item->deskripsi_ksr, 100) }}</td>
                            <td class="border border-gray-300 p-2">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                            <td class="border border-gray-300 p-2 flex justify-center gap-2">
                                <a href="{{ route('tentang.show', $item->id_tentang_ksr) }}"
                                    class="text-blue-500 hover:text-blue-700"><i class="fas fa-info-circle"></i></a>

                                <a href="{{ route('tentang.edit', $item->id_tentang_ksr) }}"
                                    class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('tentang.destroy', $item->id_tentang_ksr) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="border border-gray-300 p-4 text-center text-gray-500 italic">
                                Belum ada data tentang KSR.
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