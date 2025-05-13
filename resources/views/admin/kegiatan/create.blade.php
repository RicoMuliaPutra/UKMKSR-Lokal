
    @extends('admin.layout.navbar')
    @section('content')

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Tambah Kegiatan</h1>

        <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="block font-semibold">Nama Kegiatan:</label>
            <input type="text" name="nama_kegiatan" class="border p-2 w-full rounded" required>

            <label class="block font-semibold mt-3">Deskripsi:</label>
            <textarea id="summernote" name="deskripsi_kegiatan" class="border p-2 w-full rounded"></textarea>

            <label class="block font-semibold mt-3">Foto:</label>
            <input type="file" name="foto_kegiatan" class="border p-2 w-full rounded">

            <label class="block font-semibold mt-3">Poster:</label>
            <input type="file" name="poster_kegiatan" class="border p-2 w-full rounded">

            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('kegiatan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 150, 
            });
        });
    </script>
    @endsection