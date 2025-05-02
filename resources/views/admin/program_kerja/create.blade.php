@extends('admin.layout.navbar')

@section('content')
<div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-md">
    <h1 class="mb-4 text-2xl font-bold">program</h1>


    <form action="" method="POST">
        @csrf
        <div class="mb-4">
            <label for="jabatan_id" class="block text-sm font-medium">Pilih Jabatan</label>
            <select name="pengurus_id" required>
                <option disabled selected>Pilih Pengurus</option>
                @foreach($pengurus as $p)
                    <option value="{{ $p->id }}">
                        {{ $p->anggota->nama }} - {{ $p->jabatan->nama_jabatan }}
                    </option>
                @endforeach
            </select>

        </div>

        <div class="mb-4">
            <label for="nama_program" class="block text-sm font-medium">Nama Program</label>
            <input type="text" name="nama_program" id="nama_program" class="w-full px-3 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full px-3 py-2 border rounded"></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>

</div>
@endsection
