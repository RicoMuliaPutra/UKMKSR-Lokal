
    @extends('admin.layout.navbar')
    @section('content')
    <div class="container p-8 mx-auto">
        <h2 class="mb-6 text-2xl font-bold text-gray-700">Edit Anggota</h2>
        <form action="{{route('anggota.update', $anggota->id )}}" method="POST" class="p-6 space-y-6 bg-white rounded-lg shadow-md" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col space-y-2">
                <label for="nama" class="font-medium text-gray-700">Nama</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{$anggota->nama}}"
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
                    value="{{$anggota->nim}}"
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
                    value="{{ old('tanggal_lahir', \Carbon\Carbon::parse($anggota->tanggal_lahir)->format('Y-m-d')) }}"
                    required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="angkatan" class="font-medium text-gray-700">Angkatan</label>
                <input
                    type="text"
                    id="angkatan"
                    name="angkatan"
                    value="{{$anggota->angkatan}}"
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
                    value="{{$anggota->jurusan}}"
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
                    value="{{$anggota->prodi}}"
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
                    value="{{$anggota->tahun_masuk_kuliah}}"
                    class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan tahun masuk kuliah"
                    required>
            </div>
            <div class="flex flex-col space-y-2">
                <label class="font-medium text-gray-700">Jenis Kelamin</label>
                <div class="flex items-center space-x-4">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" class="w-4 h-4 text-blue-600 focus:ring-blue-500" @checked($anggota->jenis_kelamin == 'laki-laki')>
                        <span>Laki-laki</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="jenis_kelamin" value="Perempuan" class="w-4 h-4 text-blue-600 focus:ring-blue-500" @checked($anggota->jenis_kelamin == 'perempuan')>
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
                    <option value="" disabled {{ $anggota->status == null ? 'selected' : '' }}>Pilih status</option>
                    <option value="Aktif" {{ $anggota->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Tidak Aktif" {{ $anggota->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    <option value="Inaktif" {{ $anggota->status == 'Inaktif' ? 'selected' : '' }}>Inaktif</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="alamat" class="font-medium text-gray-700">Alamat</label>
                <input
                    type="text"
                    id="alamat"
                    name="alamat"
                    value="{{$anggota->alamat}}"
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
                    required>{{ old('alasan_join', $anggota->alasan_join) }}</textarea>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="foto" class="font-medium text-gray-700">Foto</label>
                @if ($anggota->foto)
                    <div class="mb-2">
                        <img src="{{asset('storage/'. $anggota->foto)}}" alt="foto anggota" class="w-32 h-32 rounded-md">
                    </div>
                @endif
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

@endsection