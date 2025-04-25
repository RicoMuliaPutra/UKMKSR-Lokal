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

        .switch {
            position: relative;
            display: inline-block;
            width: 38px;
            height: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 20px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #22c55e;
        }

        input:checked+.slider:before {
            transform: translateX(18px);
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">
    @extends('admin.layout.navbar')

    @section('content')
    <div class="max-w-6xl mx-auto py-5 px-4">

        <!-- Judul Halaman -->
        <div class="text-center mb-8">
            <div class="bg-gradient-to-r from-red-600 to-red-300 text-white text-xl font-bold py-4 rounded-2xl shadow-lg">
                Layanan UKM KSR
            </div>
        </div>

        <!-- Box Layanan Terkini -->
        <div class="bg-white shadow-xl rounded-3xl p-6 mt-10">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-semibold text-gray-700">Layanan Terkini</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-200 text-gray-700 font-semibold">
                        <tr>
                            <th class="px-6 py-3">No.</th>
                            <th class="px-6 py-3">Nama Layanan</th>
                            <th class="px-6 py-3">Tanggal Publikasi</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($layanan as $key => $item)
                        @if ($item->status === 'aktif')
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-3">{{ $key+1 }}</td>
                            <td class="px-6 py-3">{{ $item->nama_layanan }}</td>
                            <td class="px-6 py-3">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-3 flex items-center space-x-3">
                                <a href="{{ route('service.show', $item->id_layanan) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                <a href="{{ route('service.edit', $item->id_layanan) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('service.destroy', $item->id_layanan) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                <form action="{{ route('service.toggle', $item->id_layanan) }}" method="POST">
                                    @csrf
                                    <label class="switch">
                                        <input type="checkbox" checked onchange="this.form.submit()">
                                        <span class="slider"></span>
                                    </label>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500 italic">
                                Belum ada layanan terkini.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Box Daftar Layanan -->
        <div class="bg-white shadow-xl rounded-3xl p-6 mt-10">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-semibold text-gray-700">Daftar Layanan</h2>
                <a href="{{ route('service.create') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full text-sm shadow-md transition">
                    + Tambah
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-200 text-gray-700 font-semibold">
                        <tr>
                            <th class="px-6 py-3">No.</th>
                            <th class="px-6 py-3">Nama Layanan</th>
                            <th class="px-6 py-3">Tanggal Publikasi</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($daftarLayanan as $key => $item)
                        @if ($item->status === 'tidak')
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-3">{{ $key+1 }}</td>
                            <td class="px-6 py-3">{{ $item->nama_layanan }}</td>
                            <td class="px-6 py-3">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-3 flex items-center space-x-3">
                                <a href="{{ route('service.show', $item->id_layanan) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                <a href="{{ route('service.edit', $item->id_layanan) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('service.destroy', $item->id_layanan) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                <form action="{{ route('service.toggle', $item->id_layanan) }}" method="POST">
                                    @csrf
                                    <label class="switch">
                                        <input type="checkbox" onchange="this.form.submit()">
                                        <span class="slider"></span>
                                    </label>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500 italic">
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

</body>

</html>