<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tentang</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="text-gray-800 bg-gray-100">

    @extends('admin.layout.navbar')

    @section('content')
    <div class="container">
        <h2 class="mb-4 text-xl font-bold">Detail Tentang UKM KSR</h2>

        <div class="p-4 bg-white rounded shadow-md">
            <p class="mb-2 text-gray-700"><strong>Deskripsi:</strong></p>
            <div class="p-3 bg-gray-100 border rounded">
                {!! nl2br(e($data->deskripsi_ksr)) !!}
            </div>

            <p class="mt-4 text-sm text-gray-500">Dibuat pada: {{ $data->created_at->translatedFormat('d F Y') }}</p>
            <p class="text-sm text-gray-500">Diperbarui pada: {{ $data->updated_at->translatedFormat('d F Y') }}</p>

            <a href="{{ route('tentang.index') }}" class="inline-block mt-4 text-indigo-600 hover:underline">← Kembali</a>
        </div>
    </div>
    @endsection

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 150,
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        function showImage(imageUrl) {
            Swal.fire({
                imageUrl: imageUrl,
                imageWidth: 'auto',
                imageHeight: 'auto',
                imageAlt: 'Detail Foto',
                showConfirmButton: false,
                backdrop: true
            });
        }
    </script>
</body>

</html>
