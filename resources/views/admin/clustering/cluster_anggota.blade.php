
    @extends('admin.layout.navbar')
    @section('content')

    <h1 class="text-2xl font-bold mb-2">Hasil Clustering</h1>
    <div class="container py-8 mx-auto">
    <div class="flex flex-col gap-4 mb-4 md:flex-row md:items-center md:justify-between">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:space-x-2">
                <select id="filter"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 sm:w-auto">
                    <option value="">Semua Cluster</option>
                    @foreach ($clusters as $cluster)
                    <option value="{{ $cluster }}" {{ request('cluster') == (string)$cluster ? 'selected' : '' }}>
                        Cluster {{ $cluster }}
                    </option>
                    @endforeach
                </select>

                <script>
                    document.getElementById('filter').addEventListener('change', function () {
                        let filterValue = this.value;
                        window.location.href = `?cluster=${filterValue}`;
                    });
                </script>
            </div>
        <div class="flex space-x-2">
            <!-- Print Button -->
            <a href="/cluster/print" target="_blank" class="flex items-center justify-center px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600" onclick="openPrintTab()">
                Print
            </a>

            <!-- Back Button -->
            <a href="{{route('clustering.index')}}"
                class="flex items-center justify-center px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
                Kembali
            </a>
        </div>
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
            {{ $anggotas->appends(['cluster' => request('cluster')])->links() }}
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

    <script>
        function openPrintTab() {
            var printWindow = window.open("{{ url('/cluster/print') }}", "_blank");
            printWindow.onload = function() {
                printWindow.print();
            };
        }
    </script>
    @endsection
