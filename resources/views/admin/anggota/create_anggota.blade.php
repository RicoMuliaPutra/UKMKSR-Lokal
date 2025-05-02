<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota</title>
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
        <h2 class="mb-6 text-2xl font-bold text-gray-700">Tambah Anggota</h2>
        <form action="{{ route('anggota.store') }}" method="POST" class="p-6 space-y-6 bg-white rounded-lg shadow-md" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col space-y-2">
                <label for="nama" class="font-medium text-gray-700">Nama</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nama"
                    required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="nim" class="font-medium text-gray-700">NIM</label>
                <input
                    type="text"
                    id="nim"
                    name="nim"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan NIM"
                    required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="tanggal_lahir" class="font-medium text-gray-700">Tanggal Lahir</label>
                <input
                    type="date"
                    id="tanggal_lahir"
                    name="tanggal_lahir"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Tanggal Lahir"
                    required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="angkatan" class="font-medium text-gray-700">Angkatan</label>
                <input
                    type="text"
                    id="angkatan"
                    name="angkatan"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan angkatan"
                    required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="jurusan" class="font-medium text-gray-700">jurusan</label>
                <input
                    type="text"
                    id="jurusan"
                    name="jurusan"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan jurusan"
                    required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="prodi" class="font-medium text-gray-700">prodi</label>
                <input
                    type="text"
                    id="prodi"
                    name="prodi"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan prodi"
                    required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="tahun_masuk_kuliah" class="font-medium text-gray-700">Tahun Kuliah</label>
                <input
                    type="text"
                    id="tahun_masuk_kuliah"
                    name="tahun_masuk_kuliah"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan tahun masuk kuliah"
                    required>
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Jenis Kelamin</label>
                <div class="flex items-center space-x-4">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="jenis_kelamin" value="laki-laki" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                        <span>Laki-laki</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="jenis_kelamin" value="perempuan" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                        <span>Perempuan</span>
                    </label>
                </div>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="status" class="font-medium text-gray-700">Status</label>
                <select
                    id="status"
                    name="status"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" disabled selected>Pilih status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                    <option value="Inaktif">Inaktif</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="alamat" class="font-medium text-gray-700">Alamat</label>
                <input
                    type="text"
                    id="alamat"
                    name="alamat"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan alamat"
                    required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="alasan_join" class="font-medium text-gray-700">Alasan Bergabung</label>
                <textarea
                    id="summernote"
                    name="alasan_join"
                    rows="4"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan alasan Bergabung KSR"
                    required></textarea>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="foto" class="font-medium text-gray-700">Foto</label>
                <input
                    type="file"
                    id="foto"
                    name="foto"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    accept="image/*">
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




