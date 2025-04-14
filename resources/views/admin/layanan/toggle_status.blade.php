@extends('admin.layout.navbar')

@section('content')
<h1 class="mb-4 text-2xl font-bold">Ubah Status Layanan</h1>
<p>Apakah Anda ingin mengubah status layanan <strong>{{ $layanan->nama_layanan }}</strong> menjadi <strong>{{ $layanan->status === 'aktif' ? 'tidak aktif' : 'aktif' }}</strong>?</p>

<form action="{{ route('layanan.toggle-status', $kegiatan->id_kegiatan) }}" method="GET">
    <button type="submit" class="px-4 py-2 mt-4 text-white bg-green-500 rounded">Ya, Ubah Status</button>
    <a href="{{ route('layanan.index') }}" class="px-4 py-2 mt-4 text-white bg-gray-500 rounded">Batal</a>
</form>

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
@endsection
