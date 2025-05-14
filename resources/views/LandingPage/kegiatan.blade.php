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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Comic+Neue&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    </head>
<body class="flex flex-col min-h-screen bg-white">
    @include('partials.navbar')
    <section class="relative flex items-center justify-center w-full h-screen text-white ">
        <img class="absolute top-0 left-0 object-cover w-full h-full filter "
             src="{{ asset('img/aktifitas.png') }}"alt="Kegiatan 1">
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
        <div class="relative z-10 text-center">
            <h1 class="font-bold text-white text-7xl animate__animated animate__fadeInUp" style="font-family: 'Kanit', sans-serif;">KEGIATAN</h1>
            <hr class="w-1/2 mx-auto my-4 border-t-2 border-white opacity-80">
            <p class="mt-4 text-lg text-white">Unit Kegiatan Mahasiswa Korps Sukarela Palang Merah Indonesia Unit Politeknik Negeri Jember</p>
        </div>
    </section>
    <div class="w-full bg-red-600 h-7"></div>
    <div class="flex flex-col items-center flex-grow w-full gap-4 py-8 bg-black w-fullcontainer">
        <h1 class="text-xl font-bold text-white">TIME LINE KEGIATAN</h1>
        <div id="calendar" class="w-full max-w-xl p-4 bg-white rounded-lg shadow-md"></div>
    </div>

    <main class="container flex-1 mx-auto">
    <section class="p-4 bg-white rounded-lg">
        <div class="flex flex-col items-center justify-center p-6 py-4">
            <h2 class="text-3xl font-bold text-center">KEGIATAN KAMI</h2>
            <hr class="w-1/5 mx-auto mt-2 mb-2 border-t-2 border-black opacity-50">
            <div class="container px-4 py-6 mx-auto">
                <div class="grid gap-8 pb-8 mt-12 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($kegiatans as $kegiatan)
                        <div class="relative overflow-hidden transition-transform duration-300 translate-y-10 bg-white border border-gray-200 shadow-lg opacity-0 group hover:scale-105 hover:shadow-2xl animate-on-scroll">
                            <img src="{{ asset('storage/'. $kegiatan->foto_kegiatan) }}" alt="{{ $kegiatan->nama_kegiatan }}" class="object-cover w-full h-48 rounded-t-lg">
                            <div class="p-6 flex flex-col justify-between min-h-[200px]">
                                <p class="flex items-center gap-1 mb-1 text-sm text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                   {{ \Carbon\Carbon::parse($kegiatan->start_kegiatan)->format('d M Y') }} -
                                    {{ \Carbon\Carbon::parse($kegiatan->end_kegiatan)->format('d M Y') }}
                                </p>
                                <div>
                                    <p class="mb-2 text-xl font-bold text-black">
                                        {{ $kegiatan->nama_kegiatan }}
                                    </p>
                                </div>
                                <div class="mt-auto">
                                    <hr class="mb-4 ml-0 transition-all duration-500 ease-in-out transform translate-y-4 border-t-2 opacity-0 border-gray-80 w-2/2 group-hover:translate-y-0 group-hover:opacity-100" />
                                    <div class="transition-all duration-500 ease-in-out transform translate-y-6 opacity-0 group-hover:translate-y-0 group-hover:opacity-100">
                                        <a href="#" class="font-bold text-blue-800 hover:underline">
                                            SELENGKAPNYA
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $kegiatans->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </section>
</main>

    <div class="w-full bg-red-600 h-7"></div>
    @include('partials.footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id',
                initialView: 'dayGridMonth',
                events: '/calendar-events',
                eventClick: function(info) {
                    alert('Kegiatan: ' + info.event.title + "\nDeskripsi: " + info.event.extendedProps.description);
                }
            });
            calendar.render();
        });
    </script>
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
    }

    .fc {
        font-size: 14px;
        color: #333333;
    }

    .fc .fc-toolbar-title {
        color: #e60000;
        font-weight: bold;
    }

    .fc-button {
        background-color: #e60000 !important;
        border: none !important;
        color: #fff !important;
        border-radius: 6px !important;
        font-weight: bold;
    }

    .fc-button:hover {
        background-color: #cc0000 !important;
    }

    .fc-day-today {
        background-color: #ffe6e6 !important;
    }

    .fc-event {
        background-color: #e60000 !important;
        border-radius: 8px;
        padding: 4px 8px;
        font-size: 13px;
        color: white;
        border: 1px solid #cc0000;
        box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.1);
    }

    .fc-daygrid-day {
        background-color: #f8f8f8;
    }

    .fc-scrollgrid {
        border: 1px solid #e0e0e0;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const animatedEls = document.querySelectorAll('.animate-on-scroll');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.2
        });

        animatedEls.forEach(el => observer.observe(el));
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const elements = document.querySelectorAll('.animate-on-scroll');

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Tambahkan kelas animasi dan hapus kelas awal (opacity 0, translate-y-10)
                    entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                    observer.unobserve(entry.target); // animasi hanya terjadi sekali
                }
            });
        }, { threshold: 0.2 });

        elements.forEach(el => observer.observe(el));
    });
</script>



</body>
</html>
