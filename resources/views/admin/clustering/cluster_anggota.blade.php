
    @extends('admin.layout.navbar')
    @section('content')
    <h1 class="text-2xl font-bold mb-2">Clustering</h1>
    <div class="container py-1 mx-auto">
    <div class="flex items-center justify-between mb-4">
        <p>Hasil Clustering Data Anggota Aktif KSR</p>
        <a href="{{route('clustering.index')}}"
            class="flex items-center justify-center px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
            Kembali
        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if($anggotas && $anggotas->count() > 0)
        <table class="w-full text-sm text-left text-black rtl:text-right">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">NIM</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Angkatan</th>
                    <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                    <th scope="col" class="px-6 py-3">Prodi</th>
                    <th scope="col" class="px-6 py-3">Nilai Kehadiran</th>
                    <th scope="col" class="px-6 py-3">Nilai Kontribusi</th>
                    <th scope="col" class="px-6 py-3">Nilai Kompetensi</th>
                    <th scope="col" class="px-6 py-3">Nilai Etika</th>
                    <th scope="col" class="px-6 py-3">Cluster</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $anggota)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 border-r">{{ $anggota->anggota->nim }}</td>
                        <td class="px-4 py-2 border-r truncate max-w-[80px] overflow-hidden">{{ $anggota->anggota->nama }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->anggota->angkatan }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->anggota->jenis_kelamin }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->anggota->prodi }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->nilai_kehadiran }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->nilai_kontribusi }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->nilai_kompetensi }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->nilai_etika }}</td>
                        <td class="px-4 py-2 border-r">{{ $anggota->cluster }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $anggotas->links() }}
        </div>
        @else
        <table class="w-full text-sm text-left text-black rtl:text-right">
            <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">NIM</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Angkatan</th>
                    <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                    <th scope="col" class="px-6 py-3">Prodi</th>
                    <th scope="col" class="px-6 py-3">Nilai Kehadiran</th>
                    <th scope="col" class="px-6 py-3">Nilai Kontribusi</th>
                    <th scope="col" class="px-6 py-3">Nilai Kompetensi</th>
                    <th scope="col" class="px-6 py-3">Nilai Etika</th>
                    <th scope="col" class="px-6 py-3">Cluster</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2 text-center" colspan="10">Tidak Ada Data Anggota</td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>
    </div>
    @endsection
