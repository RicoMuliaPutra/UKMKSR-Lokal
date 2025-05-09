<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UKM KSR POLIJE</title>
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
<body class="flex flex-col min-h-screen bg-gray-100">
        @include('partials.navbar')
        <section class="relative flex items-center justify-center w-full h-screen text-white">
            <img class="absolute top-0 left-0 object-cover w-full h-full" src="{{ asset('img/kegiatan1.png') }}" alt="Kegiatan 1">
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-40"></div>
            <div class="relative z-10 px-4 text-center">
                <h1 class="text-4xl font-bold md:text-7xl animate__animated animate__fadeInUp" style="font-family: 'Kanit', sans-serif;">PROGRAM KERJA</h1>
                <hr class="w-1/2 mx-auto my-4 border-t-2 border-white opacity-80">
                <p class="mt-4 text-lg">Unit Kegiatan Mahasiswa Korps Sukarela Palang Merah Indonesia<br>Unit Politeknik Negeri Jember</p>
            </div>
        </section>
        <div class="w-full h-2 bg-red-600"></div>
        <main class="container flex-1 p-6 mx-auto">
            <div class="flex justify-start mb-6">
                <form method="GET" action="{{ route('proker') }}">
                    <select name="periode" onchange="this.form.submit()" class="w-full px-4 py-2 border border-gray-300 rounded-lg sm:w-auto focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">Semua Periode</option>
                        @foreach ($daftarPeriode as $periode)
                            <option value="{{ $periode->id }}" {{ request('periode') == $periode->id ? 'selected' : '' }}>
                                {{ $periode->nama_periode }} ({{ $periode->tahun_mulai }} - {{ $periode->tahun_selesai ?? 'Sekarang' }})
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse($dataProgram as $jabatan => $programList)
                    <div class="p-6 mb-6 bg-white rounded-lg shadow animate__animated scroll-fade">
                        <h2 class="mb-4 text-xl font-bold text-red-600">{{ $jabatan }}</h2>
                        <ul class="space-y-3">
                            @foreach($programList as $program)
                                <li class="pl-4 border-l-4 border-red-600">
                                    <h3 class="font-semibold text-gray-800">{{ $program->nama_program }}</h3>
                                    <p class="text-sm text-gray-600">{!! $program->deskripsi !!}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @empty
                    <div class="p-6 text-gray-600 bg-white rounded-lg shadow">
                        Tidak ada program kerja yang tersedia untuk periode ini.
                    </div>
                @endforelse
            </div>
        </main>
        @include('partials.footer')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate__fadeInUp');
                            entry.target.classList.remove('opacity-0');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.2
                });

                document.querySelectorAll('.scroll-fade').forEach(el => {
                    el.classList.add('opacity-0'); // Hidden by default
                    observer.observe(el);
                });
            });
        </script>

        </body>
    </html>
