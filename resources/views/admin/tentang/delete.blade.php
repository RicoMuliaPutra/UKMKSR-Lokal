@extends('layouts.app')

@section('content')
<div class="container px-4 mx-auto">
    <div class="p-6 bg-white rounded shadow">
        <h2 class="mb-4 text-2xl font-semibold text-red-600">Hapus Data</h2>
        <p class="mb-4">Apakah kamu yakin ingin menghapus data ini?</p>

        <form action="{{ route('tentang.destroy', $tentang->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex justify-between mt-6">
                <a href="{{ route('tentang.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-700">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-800">
                    Ya, Hapus
                </button>
            </div>
        </form>
    </div>
</div>
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
