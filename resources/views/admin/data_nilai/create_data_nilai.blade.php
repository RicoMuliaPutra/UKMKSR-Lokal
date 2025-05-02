<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Anggota</title>
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
<body class="text-gray-800 bg-gray-100" >
    @extends('admin.layout.navbar')
    @section('content')
    <div class="container p-8 mx-auto">
        <h2 class="mb-6 text-2xl font-bold text-gray-700">Tambah Data Nilai Anggota</h2>
        <form action="{{ route('nilai.store') }}" method="POST" class="p-6 space-y-6 bg-white rounded-lg shadow-md" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col space-y-2">
                <label for="id" class="font-medium text-gray-700">Nama Anggota</label>
                <select
                    id="id"
                    name="id"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" disabled selected>Pilih Anggota</option>
                    @foreach($anggotas as $anggota)
                        <option value="{{$anggota->id}}">{{$anggota->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="nilai_kehadiran" class="font-medium text-gray-700">Nilai Kehadiran</label>
                <input
                    type="number"
                    id="nilai_kehadiran"
                    name="nilai_kehadiran"
                    min="0"
                    max="100"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nilai kehadiran">
            </div>
            <div class="flex flex-col space-y-2">
                <label for="nilai_kontribusi" class="font-medium text-gray-700">Nilai Kontribusi</label>
                <input
                    type="number"
                    id="nilai_kontribusi"
                    name="nilai_kontribusi"
                    min="0"
                    max="100"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nilai kontribusi">
            </div>
            <div class="flex flex-col space-y-2">
                <label for="nilai_kompetensi" class="font-medium text-gray-700">Nilai Kompetensi</label>
                <input
                    type="number"
                    id="nilai_kompetensi"
                    name="nilai_kompetensi"
                    min="0"
                    max="100"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nilai kompetensi">
            </div>
            <div class="flex flex-col space-y-2">
                <label for="nilai_etika" class="font-medium text-gray-700">Nilai Etika</label>
                <input
                    type="number"
                    id="nilai_etika"
                    name="nilai_etika"
                    min="0"
                    max="100"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nilai etika">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 text-white bg-green-500 rounded-md hover:bg-green-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
    <!-- Tambahkan SweetAlert -->
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




