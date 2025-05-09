<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <aside id="sidebar" class="sticky z-40 flex flex-col w-64 h-screen overflow-hidden transition-all duration-300 bg-white shadow-md top-16 lg:block hidden">
                @include('admin.layout.sidebar')
            </aside>
            
            <!-- Main Content -->
            <main class="flex-grow p-4 sm:p-6 md:p-8 overflow-auto">
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
