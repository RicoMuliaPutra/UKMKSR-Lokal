<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kegiatan</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="text-gray-800 bg-gray-100">
    @extends('admin.layout.navbar')

    @section('content')
    <div class="p-6 bg-white rounded shadow">
        <h2 class="mb-4 text-2xl font-bold text-red-600">
            Detail Program Kerja: {{ $jabatan->nama_jabatan }}
        </h2>

        <h3 class="mb-2 text-lg font-semibold text-gray-800">Pengurus:</h3>
        <ul class="mb-4 list-disc list-inside">
            @foreach($jabatan->pengurus as $pengurus)
                <li>{{ $pengurus->anggota->nama ?? '-' }}</li>
            @endforeach
        </ul>
        <h3 class="mb-2 text-lg font-semibold text-gray-800">Periode:</h3>

        <ul class="mb-4 list-disc list-inside">
            @foreach($jabatan->pengurus as $pengurus)
                <li>{{ $pengurus->periode->nama_periode ?? '-' }}</li>
            @endforeach
        </ul>

        <h3 class="mb-2 text-lg font-semibold text-gray-800">Daftar Program Kerja:</h3>
        <ul class="space-y-3">
            @forelse($jabatan->programKerja as $program)
            <li class="relative pl-4 border-l-4 border-red-600">
                <div class="flex items-start justify-between">
                    <div>
                        <h4 class="font-semibold text-gray-800">{{ $program->nama_program }}</h4>
                        <p class="text-sm text-gray-600">{!! $program->deskripsi !!}</p>
                    </div>
                    <form action="{{ route('Program_kerja.destroy', $program->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 font-bold text-gray-700 transition bg-transparent border-2 border-gray-400 rounded-lg hover:border-sky-400 hover:text-sky-400">Hapus</button>
                    </form>
                </div>
            </li>
        @empty
            <li class="text-gray-500">Tidak ada program kerja.</li>
        @endforelse
        </ul>

        <a href="{{ route('Program_kerja.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">
            &larr; Kembali
        </a>
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
