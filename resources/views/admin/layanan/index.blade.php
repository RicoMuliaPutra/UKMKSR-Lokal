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

<body class="text-gray-800 bg-gray-100">
    @extends('admin.layout.navbar')

    @section('content')
    <div class="container mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Layanan</h1>

        <!-- Layanan Terkini -->
        <div class="p-4 mb-4 bg-white rounded-lg shadow-md">
            <h2 class="mb-2 text-lg font-semibold">Layanan Terkini</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border border-collapse border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-2 border border-gray-300">No.</th>
                            <th class="p-2 border border-gray-300">Nama Layanan</th>
                            <th class="p-2 border border-gray-300">Tanggal Publikasi</th>
                            <th class="p-2 border border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($layanan as $key => $item)
                        @if ($item->status === 'aktif')
                        <tr class="text-center bg-gray-50 hover:bg-gray-100">
                            <td class="p-2 border border-gray-300">{{ $key+1 }}</td>
                            <td class="p-2 border border-gray-300">{{ $item->nama_layanan }}</td>
                            <td class="p-2 border border-gray-300">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td class="flex justify-center gap-2 p-2 border border-gray-300">
                                <a href="{{ route('service.show', $item->id_layanan) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-info-circle"></i></a>

                                <a href="{{ route('service.edit', $item->id_layanan) }}" class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('service.destroy', $item->id_layanan) }}" method="POST" style="display:inline;">
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
                            <td colspan="4" class="p-4 italic text-center text-gray-500 border border-gray-300">
                                Tidak ada layanan terkini.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Daftar Layanan -->
        <div class="p-4 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-lg font-semibold">Daftar Layanan</h2>
                <a href="{{ route('service.create') }}"
                    class="px-3 py-1 text-sm text-white transition bg-blue-500 rounded hover:bg-blue-600">
                    + Tambah
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border border-collapse border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-2 border border-gray-300">No.</th>
                            <th class="p-2 border border-gray-300">Nama Layanan</th>
                            <th class="p-2 border border-gray-300">Tanggal Publikasi</th>
                            <th class="p-2 border border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($daftarLayanan as $key => $item)
                        @if ($item->status === 'tidak')
                        <tr class="text-center bg-gray-50 hover:bg-gray-100">
                            <td class="p-2 border border-gray-300">{{ $key+1 }}</td>
                            <td class="p-2 border border-gray-300">{{ $item->nama_layanan }}</td>
                            <td class="p-2 border border-gray-300">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td class="flex justify-center gap-2 p-2 border border-gray-300">
                                <a href="{{ route('service.show', $item->id_layanan) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-info-circle"></i></a>

                                <a href="{{ route('service.edit', $item->id_layanan) }}" class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('service.destroy', $item->id_layanan) }}" method="POST" style="display:inline;">
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
                            <td colspan="4" class="p-4 italic text-center text-gray-500 border border-gray-300">
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
