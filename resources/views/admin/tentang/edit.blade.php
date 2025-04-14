<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tentang</title>

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

<body class="bg-gray-100 text-gray-800">

    @extends('admin.layout.navbar')

    @section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">
        <h1 class="text-2xl font-bold mb-4">Edit Tentang UKM KSR</h1>

        <form action="{{ route('tentang.update', $data->id_tentang_ksr) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block font-semibold">Deskripsi:</label>
            <textarea id="summernote" name="deskripsi_ksr" required>{{ old('deskripsi_ksr', $data->deskripsi_ksr) }}</textarea>
            @error('deskripsi_ksr')
            <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('tentang.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
            </div>
        </form>
    </div>
    @endsection

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 150,
            });
        });
    </script>
</body>

</html>