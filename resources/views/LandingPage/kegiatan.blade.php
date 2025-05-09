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
    </head>
<body class="flex flex-col min-h-screen bg-white">
    @include('partials.navbar')
    <section class="relative flex items-center justify-center w-full h-screen text-white">
        <img class="absolute top-0 left-0 object-cover w-full h-full filter "
             src="{{ asset('img/aktifitas.png') }}"alt="Kegiatan 1">
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
        <div class="relative z-10 text-center">
            <h1 class="font-bold text-white text-7xl" style="font-family: 'Kanit', sans-serif;">KEGIATAN</h1>
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

{{-- <style>
    body {
        font-family: 'Comic Neue', cursive;
    }

    .fc {
        font-size: 14px;
        color: #333;
    }

    .fc .fc-toolbar-title {
        color: #ff69b4; /* pink title */
        font-weight: bold;
    }
    .fc-daygrid-day {
    background-color: #fff8f0; /* warna pastel */
    border: 1px dashed #ffb6c1;
}

.fc-day-today {
    background-color: #ffe6f0 !important; /* warna hari ini */
}
.fc-daygrid-day {
    background-color: #fff8f0; /* warna pastel */
    border: 1px dashed #ffb6c1;
}

.fc-day-today {
    background-color: #ffe6f0 !important; /* warna hari ini */
}
.fc-event {
    background-color: #ffd6e0 !important;
    border: none;
    border-radius: 12px;
    padding: 4px 8px;
    font-size: 13px;
    color: #5c0067;
    box-shadow: 2px 2px 5px rgba(255, 182, 193, 0.5);
}
.fc-button {
    background-color: #ffb3c1 !important;
    border: none !important;
    color: #fff !important;
    border-radius: 8px !important;
    padding: 5px 10px;
    font-weight: bold;
}

</style> --}}
</body>
</html>
