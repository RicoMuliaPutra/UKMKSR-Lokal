
    @extends('admin.layout.navbar')
    @section('content')

    <div class="max-w-4xl p-6 mx-auto mt-6 bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Edit Tentang UKM KSR</h1>

        <form action="{{ route('tentang.update', $data->id_tentang_ksr) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block font-semibold">Deskripsi:</label>
            <textarea id="summernote" name="deskripsi_ksr" required>{{ old('deskripsi_ksr', $data->deskripsi_ksr) }}</textarea>
            @error('deskripsi_ksr')
            <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror

            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('tentang.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded">Kembali</a>
                <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">Update</button>
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
    @endsection