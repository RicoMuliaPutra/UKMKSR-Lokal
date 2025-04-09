@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold text-red-600 mb-4">Hapus Data</h2>
        <p class="mb-4">Apakah kamu yakin ingin menghapus data ini?</p>

        <form action="{{ route('tentang.destroy', $tentang->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex justify-between mt-6">
                <a href="{{ route('tentang.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Batal
                </a>
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-800">
                    Ya, Hapus
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
