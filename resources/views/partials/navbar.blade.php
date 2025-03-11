<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="flex items-center h-20 px-10 text-white bg-red-600">
        <div class="flex items-center justify-between w-full mx-auto max-w-7xl">
            <div class="flex items-center space-x-4">
                <img src="{{asset('img/logo_utama.svg')}}" alt="Logo" class="h-14">
                <span class="font-bold">UKM KSR POLITEKNIK NEGERI JEMBER</span>
            </div>

            <!-- Menu Navigasi di Kanan -->
            <div class="hidden ml-auto space-x-6 text-lg md:flex">
                <a href="#" class="hover:text-gray-300">Beranda</a>

                <!-- Dropdown -->
                <div class="relative group">
                    <button class="hover:text-gray-300">Tentang</button>
                    <div class="absolute left-0 invisible mt-2 text-white transition-all bg-black rounded-md shadow-lg opacity-0 w-52 group-hover:opacity-100 group-hover:visible">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-700">Sejarah</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-700">Pengurus 2025</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-700">Visi & Misi 2024</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-700">Program Kerja 2024</a>
                    </div>
                </div>
                <a href="#" class="hover:text-gray-300">Layanan</a>
                <a href="#" class="hover:text-gray-300">Kegiatan</a>
                <a href="#" class="hover:text-gray-300">HUT KSR</a>
                <a href="#" class="hover:text-gray-300">Blog</a>
                <button id="navAction" class="" onclick="window.location='{{ url('login') }}'">
                    Login
                </button>
            </div>

            <!-- Tombol Menu Mobile -->
            <button class="text-3xl md:hidden focus:outline-none" id="menu-btn">☰</button>
        </div>
    </nav>

    <!-- Mobile Sidebar -->
    <div id="mobile-menu" class="fixed inset-0 w-64 text-white transition-transform transform -translate-x-full bg-black md:hidden">
        <div class="flex justify-between p-4">
            <span class="text-xl font-bold">Menu</span>
            <button id="close-menu" class="text-2xl">&times;</button>
        </div>
        <nav class="flex flex-col px-4 space-y-4">
            <a href="#" class="hover:text-gray-300">Beranda</a>

            <!-- Dropdown di Mobile -->
            <div class="relative group">
                <a href="#" class="px-4 py-2 text-white">Tentang</a>
                <div class="absolute left-0 z-50 invisible w-48 mt-2 text-white transition-all duration-300 bg-black opacity-0 group-hover:opacity-100 group-hover:visible">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-700">Sejarah</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-700">Pengurus 2025</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-700">Visi & Misi 2024</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-700">Program Kerja 2024</a>
                </div>
            </div>

            <a href="#" class="hover:text-gray-300">Layanan</a>
            <a href="#" class="hover:text-gray-300">Kegiatan</a>
            <a href="#" class="hover:text-gray-300">HUT KSR</a>
            <a href="#" class="hover:text-gray-300">Blog</a>
            <button id="navAction" class="" onclick="window.location='{{ url('login') }}'">
                Login
            </button>
        </nav>
    </div>

    <!-- Script untuk Menu Mobile -->
    <script>
        document.getElementById('menu-btn').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.remove('-translate-x-full');
        });
        document.getElementById('close-menu').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.add('-translate-x-full');
        });
    </script>
</body>
</html>
