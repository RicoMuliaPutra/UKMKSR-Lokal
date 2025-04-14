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
    <div class="container p-8 mx-auto">
        <h2 class="mb-6 text-2xl font-bold text-gray-700">Edit Layanan</h2>
        <form action="{{ route('service.update', $layanan->id) }}" method="POST" class="p-6 space-y-6 bg-white rounded-lg shadow-md" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-2">
                <label for="nama" class="font-medium text-gray-700">Nama Layanan</label>
                <input
                    type="text"
                    id="nama_layanan"
                    name="nama_layanan"
                    value="{{$layanan->nama_layanan}}"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nama_layanan"
                    required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="deskripsi" class="font-medium text-gray-700">Deskripsi</label>
                <textarea
                    id="summernote"
                    name="deskripsi"
                    rows="4"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan alasan Bergabung KSR"
                    required>{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="foto_layanan" class="font-medium text-gray-700">Foto Layanan</label>
                @if ($layanan->foto_layanan)
                    <div class="mb-2">
                        <img src="{{asset( $layanan->foto_layanan)}}" alt="foto layanan" class="w-32 h-32 rounded-md">
                    </div>
                @endif
                <input
                    type="file"
                    id="foto_layanan"
                    name="foto_layanan"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    accept="image/*">
            </div>

            <div class="flex flex-col space-y-2">
                <label for="poster_layanan" class="font-medium text-gray-700">Poster layanan</label>
                @if ($layanan->poster_layanan)
                    <div class="mb-2">
                        <img src="{{asset($layanan->poster_layanan)}}" alt="poster layanan" class="w-32 h-32 rounded-md">
                    </div>
                @endif
                <input
                    type="file"
                    id="poster_layanan"
                    name="poster_layanan"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    accept="image/*">
            </div>
            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('service.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded">Batal</a>
                <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded">Simpan</button>
            </div>
        </form>
    </div>

    @endsection
    @push('scripts')
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
    @endpush
    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 200,
                placeholder: 'Tulis deskripsi blog di sini...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
@endpush

</body>
</html>
