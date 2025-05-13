
    @extends('admin.layout.navbar')
    @section('content')

    <h1 class="mb-4 text-2xl font-bold">Anggota KSR</h1>
    <div class="container py-8 mx-auto">
        <div class="flex flex-col gap-4 mb-4 md:flex-row md:items-center md:justify-between">
            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:space-x-2">
                <select id="filter"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 sm:w-auto">
                    <option value="">Semua Angkatan</option>
                    @foreach ($angkatanList as $tahun)
                    <option value="{{ $tahun }}" {{ request('angkatan') == $tahun ? 'selected' : '' }}>
                        {{ $tahun }}
                    </option>
                    @endforeach
                </select>

                <form action="{{ route('anggota.search') }}" method="GET" class="flex flex-col w-full gap-2 sm:flex-row sm:items-center">
                    <input type="hidden" name="angkatan" value="{{ request('angkatan') }}">

                    <input type="text" name="query" placeholder="Cari Anggota..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 sm:w-auto"
                        value="{{ request('query') }}">

                    <button type="submit"
                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 w-full sm:w-auto">
                        Cari
                    </button>
                </form>


                <script>
                    document.getElementById('filter').addEventListener('change', function () {
                        let filterValue = this.value;
                        window.location.href = `?angkatan=${filterValue}`;
                    });
                </script>
            </div>
            <div class="flex gap-2">
                <!-- Form Import Excel -->
                <form action="{{ route('anggota.import') }}" method="POST" enctype="multipart/form-data"
                    class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-md" id="import-form">
                    @csrf
                    <input type="file" name="file" accept=".xlsx,.xls" class="text-sm text-gray-500" required>

                    <button type="button" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600" id="import-btn">
                        Import Excel
                    </button>
                </form>

                <!-- Tombol Tambah -->
                <a href="{{ route('anggota.create') }}"
                    class="flex items-center justify-center px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah
                </a>
            </div>
        </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-black rtl:text-right">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">NIM</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Angkatan</th>
                    <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                    <th scope="col" class="px-6 py-3">Jurusan</th>
                    <th scope="col" class="px-6 py-3">Prodi</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Foto</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $key => $anggota)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 border-r">{{ $anggota->nim }}</td>
                        <td class="px-4 py-2 border-r truncate max-w-[80px] overflow-hidden">{{ $anggota->nama }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->angkatan }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->jenis_kelamin }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->alamat }}</td>
                        <td class="px-4 py-2 border-r truncate max-w-[80px] overflow-hidden">{{ $anggota->jurusan }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->prodi }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->status }}</td>
                        <td class="px-4 py-2 text-center border-r">
                            @if ($anggota->foto)
                                <img src="{{ asset('storage/' . $anggota->foto) }}"
                                     alt="Gambar Anggota"
                                     class="object-cover w-20 h-20 rounded cursor-pointer"
                                     onclick="showImage('{{ asset('storage/' . $anggota->foto) }}')">
                            @else
                                <span>-</span>
                            @endif
                        </td>
                        <td class="flex items-center justify-center px-4 py-2 space-x-2">
                            <a href="{{ route('anggota.edit', $anggota->id) }}" class="flex items-center px-2 py-1 text-white bg-yellow-400 rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus anggota ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex items-center px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $anggotas->links() }}
        </div>
    </div>
    </div>
    
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('import-btn').addEventListener('click', function () {
                Swal.fire({
                    title: 'Konfirmasi Import',
                    html: `
                        <p>Pastikan urutan kolom di file Excel sesuai dengan daftar di bawah dan gunakan huruf besar/kecil yang sama persis (case-sensitive).</p>
                        <ol style="text-align:left">
                            <li>nim</li>
                            <li>nama</li>
                            <li>tanggal_Lahir (YYYY-MM-DD)</li>
                            <li>alamat</li>
                            <li>alasan_join</li>
                            <li>angkatan</li>
                            <li>jurusan</li>
                            <li>prodi</li>
                            <li>status</li>
                            <li>tahun_masuk_kuliah</li>
                            <li>jenis_kelamin</li>
                        </ol>
                    `,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Lanjutkan Import',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('import-form').submit();
                    }
                });
            });
        });
    </script>

    <script>
    @if ($errors->any())
        let errorMessages = `
            <ul style="text-align: left;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        `;
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan!',
            html: errorMessages,
            confirmButtonText: 'OK'
        });
    @endif
</script>
@endsection