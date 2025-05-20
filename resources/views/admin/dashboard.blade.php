
    @extends('admin.layout.navbar')
    @section('content')
    <h1 class="text-2xl font-bold mb-2">Beranda</h1>
    <div class="container py-8 mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition h-48 flex flex-col justify-center">
            <h3 class="text-gray-500 mb-2 text-center">Seluruh Anggota {{$tahun_sekarang}}</h3>
            <p class="text-6xl font-bold text-gray-500 text-center" id="total-members"></p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition h-48 flex flex-col justify-center">
            <h3 class="text-gray-500 mb-2 text-center">Anggota Aktif {{$tahun_sekarang}}</h3>
            <p class="text-6xl font-bold text-gray-500 text-center" id="active-members"></p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition h-48 flex flex-col justify-center">
            <h3 class="text-gray-500 mb-2 text-center">Anggota In-Aktif {{$tahun_sekarang}}</h3>
            <p class="text-6xl font-bold text-gray-500 text-center" id="inactive-members"></p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition md:col-span-2">
            <h3 class="text-gray-500 mb-4">Statistik Jumlah Anggota</h3>
            <canvas id="anggotaChart" class="w-full h-40"></canvas>
        </div>

        <div class="flex flex-col gap-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition h-48 flex flex-col justify-center">
                    <h3 class="text-gray-500 mb-2 text-center">Kegiatan {{$tahun_sekarang}}</h3>
                    <p class="text-6xl font-bold text-gray-500 text-center" id="event-count"></p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition h-48 flex flex-col justify-center">
                    <h3 class="text-gray-500 mb-2 text-center">Layanan {{$tahun_sekarang}}</h3>
                    <p class="text-6xl font-bold text-gray-500 text-center" id="service-count"></p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition h-96 flex flex-col justify-start">
                <h3 class="text-gray-500 mb-2 text-center">Ulang Tahun Anggota</h3>
                <!-- Table Head -->
                <table class="w-full text-sm text-left text-black rtl:text-right">
                    <thead class="text-xs text-white uppercase bg-red-500 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Angkatan</th>
                            <th scope="col" class="px-6 py-3">Prodi</th>
                            <th scope="col" class="px-6 py-3">Tanggal Lahir</th>
                        </tr>
                    </thead>
                </table>

                <!-- Scrollable Table Body -->
                <div class="overflow-y-auto max-h-64">
                    <table class="w-full text-sm text-left text-black rtl:text-right">
                        <tbody>
                            @forelse ($ulang_tahun_anggota as $index => $anggota)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 border-r">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border-r truncate max-w-[80px] overflow-hidden">{{ $anggota->nama }}</td>
                                <td class="px-4 py-2 border-r">{{ $anggota->angkatan }}</td>
                                <td class="px-4 py-2 border-r truncate max-w-[80px] overflow-hidden">{{ $anggota->prodi }}</td>
                                <td class="px-4 py-2 border-r">{{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->format('d-m-Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">Tidak ada ulang tahun dalam 2 minggu ke depan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-10 text-center text-gray-500">
        © 2025 Unit Kegiatan Mahasiswa Korps Sukarela (UKM KSR)
    </footer>

    <script>

        const datas = @json($data_grafik);
        const labels = @json($angkatan_grafik);

        const ctx = document.getElementById('anggotaChart').getContext('2d');
        const anggotaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah',
                    data: datas,
                    backgroundColor: ['#22C55E', '#22C55E', '#22C55E', '#22C55E', '#22C55E'],
                    borderRadius: 10,
                    barThickness: 35
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>

        const jumlah_seluruh_anggota = {{$jumlah_seluruh_anggota ?? 0}};
        const jumlah_seluruh_anggota_aktif = {{$jumlah_seluruh_anggota_aktif ?? 0}};
        const jumlah_seluruh_anggota_in_aktif = {{$jumlah_seluruh_anggota_in_aktif ?? 0}};
        const jumlah_kegiatan = {{$jumlah_kegiatan ?? 0}};
        const jumlah_layanan = {{$jumlah_layanan ?? 0}};

        function animateValue(id, start, end, duration) {
            const obj = document.getElementById(id);

            if (end === start) {
                obj.textContent = end;
                return;
            }

            let current = start;
            const increment = end > start ? 1 : -1;
            const stepTime = Math.abs(Math.floor(duration / Math.abs(end - start)));

            const timer = setInterval(function() {
                current += increment;
                obj.textContent = current;
                if (current === end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }

        animateValue("total-members", 0, jumlah_seluruh_anggota ? jumlah_seluruh_anggota : 0, 1000);
        animateValue("active-members", 0, jumlah_seluruh_anggota_aktif && jumlah_seluruh_anggota_aktif != null ? jumlah_seluruh_anggota_aktif : 0, 1000);
        animateValue("inactive-members", 0, jumlah_seluruh_anggota_in_aktif && jumlah_seluruh_anggota_in_aktif != null ? jumlah_seluruh_anggota_in_aktif : 0, 1000);
        animateValue("event-count", 0, jumlah_kegiatan ? jumlah_kegiatan : 0, 1000);
        animateValue("service-count", 0, jumlah_layanan ? jumlah_layanan : 0, 1000);
    </script>

    @endsection