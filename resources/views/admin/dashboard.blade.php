<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">
    @extends('admin.layout.navbar')

    @section('content')
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
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition h-48 flex flex-col justify-center">
                <h3 class="text-gray-500 mb-2 text-center">Kegiatan {{$tahun_sekarang}}</h3>
                <p class="text-6xl font-bold text-gray-500 text-center" id="event-count"></p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition h-48 flex flex-col justify-center">
                <h3 class="text-gray-500 mb-2 text-center">Layanan {{$tahun_sekarang}}</h3>
                <p class="text-6xl font-bold text-gray-500 text-center" id="service-count"></p>
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

        const jumlah_seluruh_anggota = {{$jumlah_seluruh_anggota}};
        const jumlah_seluruh_anggota_aktif = {{$jumlah_seluruh_anggota_aktif}};
        const jumlah_seluruh_anggota_in_aktif = {{$jumlah_seluruh_anggota_in_aktif}};
        const jumlah_kegiatan = {{$jumlah_kegiatan}};
        const jumlah_layanan = {{$jumlah_layanan}};

        function animateValue(id, start, end, duration) {
            let current = start;
            const increment = end > start ? 1 : -1;
            const stepTime = Math.abs(Math.floor(duration / (end - start)));
            const obj = document.getElementById(id);

            const timer = setInterval(function() {
                current += increment;
                obj.textContent = current;
                if (current == end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }

        animateValue("total-members", 0, jumlah_seluruh_anggota ? jumlah_seluruh_anggota : 0, 2000);
        animateValue("active-members", 0, jumlah_seluruh_anggota_aktif ? jumlah_seluruh_anggota_aktif : 0, 2000);
        animateValue("inactive-members", 0, jumlah_seluruh_anggota_in_aktif ? jumlah_seluruh_anggota_in_aktif : 0, 2000);
        animateValue("event-count", 0, jumlah_kegiatan ? jumlah_kegiatan : 0, 2000);
        animateValue("service-count", 0, jumlah_layanan ? jumlah_layanan : 0, 2000);
    </script>

    @endsection
</body>

</html>