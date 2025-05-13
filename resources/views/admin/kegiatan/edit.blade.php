    @extends('admin.layout.navbar')
    @section('content')

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Edit Kegiatan</h1>

        <form action="{{ route('kegiatan.update', $kegiatan->id_kegiatan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block font-semibold">Nama Kegiatan:</label>
            <input type="text" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}" class="border p-2 w-full rounded" required>

            <label class="block font-semibold mt-3">Deskripsi:</label>
            <textarea name="deskripsi_kegiatan" class="border p-2 w-full rounded" id="summernote">{{ $kegiatan->deskripsi_kegiatan }}</textarea>

            <label class="block font-semibold mt-3">Tanggal Mulai:</label>
            <input type="date" name="start_kegiatan" value="{{ \Carbon\Carbon::parse($kegiatan->start_kegiatan)->format('Y-m-d') }}" class="border p-2 w-full rounded" required>

            <label class="block font-semibold mt-3">Tanggal Selesai:</label>
            <input type="date" name="end_kegiatan" value="{{ \Carbon\Carbon::parse($kegiatan->end_kegiatan)->format('Y-m-d') }}" class="border p-2 w-full rounded" required>

            <label class="block font-semibold mt-3">Foto:</label>
            <input type="file" name="foto_kegiatan" class="border p-2 w-full rounded">
            @if ($kegiatan->foto_kegiatan)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $kegiatan->foto_kegiatan) }}" class="w-32 h-32 object-cover rounded" alt="Foto Kegiatan">
            </div>
            @endif

            <label class="block font-semibold mt-3">Poster:</label>
            <input type="file" name="poster_kegiatan" class="border p-2 w-full rounded">
            @if ($kegiatan->poster_kegiatan)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $kegiatan->poster_kegiatan) }}" class="w-32 h-32 object-cover rounded" alt="Poster Kegiatan">
            </div>
            @endif

            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('kegiatan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 150,
                placeholder: 'Deskripsi Kegiatan...',
            });
        });
    </script>
    @endsection

