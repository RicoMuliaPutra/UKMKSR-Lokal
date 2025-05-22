<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.min.css" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex flex-col h-screen">
        <!-- Navbar -->
        <header class="sticky top-0 z-50 flex items-center justify-between h-16 px-4 bg-white shadow-md">
            <div class="flex items-center w-full justify-between">
                <!-- Logo -->
                <img src="/img/Logo_solo.png" alt="Logo Humas Polije" class="object-contain w-auto h-12 md:h-16 lg:block" />

                <!-- Hamburger button (only visible on mobile) -->
                <button id="toggleSidebar" class="text-4xl text-gray-700 focus:outline-none md:hidden">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Profile (always visible on the right) -->
            <div class="flex items-center mr-5 space-x-3">
                <a href="{{ route('profile.edit') }}" class="text-3xl text-red-600">
                    <i class="fas fa-user-circle"></i>
                </a>
            </div>
        </header>

        <div class="flex flex-grow">

            <!-- Sidebar (Hidden on Mobile, initially) -->
            {{-- <aside id="sidebar" class="sticky z-40 flex flex-col w-64 h-screen overflow-hidden transition-all duration-300 bg-white shadow-md top-16 lg:block hidden"> --}}
            <aside id="sidebar" class="fixed top-16 left-0 z-40 w-64 h-[calc(100vh-4rem)] bg-white shadow-md hidden lg:block">

                @include('admin.layout.sidebar')
            </aside>
            
            <!-- Main Content -->
            {{-- <main class="flex-grow p-4 sm:p-6 md:p-8 overflow-auto"> --}}
            <main class="flex-grow p-4 sm:p-6 md:p-8 overflow-auto lg:ml-64 mt-2">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleSidebar.addEventListener('click', () => {
            // Toggle the visibility of sidebar on mobile
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                sidebar.classList.add('block');
            } else {
                sidebar.classList.remove('block');
                sidebar.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
