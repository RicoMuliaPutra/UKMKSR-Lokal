<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM KSR POLIJE</title>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

    <!-- Navbar -->
    @include('partials.navbar')
    <section class="relative flex items-center justify-center w-full h-screen text-white">
        <video class="absolute top-0 left-0 object-cover w-full h-full" autoplay loop muted playsinline>
            <source src="{{asset('img/vt2.mp4')}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
        <div class="relative z-10 text-center">
            <h1 class="font-bold text-white text-7xl" style="font-family: 'Kanit', sans-serif;">UKM KSR PMI UNIT</h1>
            <h1 class="font-bold text-white text-7xl" style="font-family: 'Kanit', sans-serif;">POLITEKNIK NEGERI JEMBER</h1>
            <hr class="w-1/3 mx-auto my-4 border-t-2 border-white opacity-80">
            <p class="mt-4 text-lg text-white">Unit Kegiatan Mahasiswa Korps Sukarela Palang Merah Indonesia Unit Politeknik Negeri Jember</p>
        </div>
    </section>
    <main class="container flex-1 p-6 mx-auto">
        <section class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-4 text-2xl font-bold">Welcome to UKM KSR POLIJE</h2>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </section>
    </main>

    <!-- Footer -->
    @include('partials.footer')

</body>
</html>
