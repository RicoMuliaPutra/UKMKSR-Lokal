
@extends('admin.layout.navbar')

@section('content')
<div class="max-w-6xl px-4 py-5 mx-auto">
    <div class="mb-8 text-center">
        <div class="py-4 text-xl font-bold text-white shadow-lg bg-gradient-to-r from-red-600 to-red-300 rounded-2xl">
           Blog Artikel
        </div>
    </div>

    <div class="p-6 mt-10 bg-white shadow-xl rounded-2xl">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-700">Blog View</h2>
            <a href="{{route('blogadmin.create')}}"
            class="px-4 py-2 text-sm text-white transition bg-green-600 rounded-full shadow-md hover:bg-green-700">
            + Tambah
        </a>

        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="font-semibold text-gray-700 bg-gray-200">
                    <tr>
                        <th class="px-6 py-3">No.</th>
                        <th class="px-6 py-3">Judul</th>
                        <th class="px-6 py-3">Tanggal publikasi</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($blogs as $key => $blog)
                    <tr >
                        <td class="px-6 py-3 ">{{ $key + 1 }}</td>
                        <td class="px-6 py-3">{{ $blog->title }}</td>
                        <td class="px-6 py-3">{{ $blog->created_at ? $blog->created_at->format('Y-m-d') : '-' }}</td>
                        {{-- <td class="px-4 py-2 border-r">{!! Str::limit(strip_tags($blog->description), 50, '...') !!}</td> --}}
                        {{-- <td class="px-4 py-2 text-center border-r">
                            @if ($blog->images)
                                <img src="{{ asset('storage/'. $blog->images) }}" alt="Gambar Blog" class="object-cover w-20 h-20 rounded">
                            @else
                                <span>-</span>
                            @endif                            </td> --}}
                            <td class="flex items-center px-6 py-3 space-x-3">
                                <a href="{{route('blogadmin.show', $blog->id)}}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <a href="{{ route('blogadmin.edit', $blog->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                            <form action="{{ route('blogadmin.destroy', $blog->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success") }}',
            confirmButtonText: 'OK'
        });
        @endif
    </script>
    @endsection

