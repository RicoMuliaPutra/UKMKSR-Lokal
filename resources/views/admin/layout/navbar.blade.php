<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex flex-col h-screen">
        <!-- Navbar -->
        <header class="bg-white shadow-md px-4 flex items-center justify-between sticky top-0 z-50 h-32">
            <div class="flex items-center space-x-32" style="margin-left: 5.2rem;">
                <!-- Logo -->
                <img src="/img/Logo_solo.png" alt="Logo Humas Polije" class="h-16 w-auto object-contain" />
                <!-- Hamburger button -->
                <button id="toggleSidebar" class="text-gray-700 text-4xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="flex items-center space-x-3 mr-5">
                <a href="#" class="text-red-600 text-4xl">
                    <i class="fas fa-user-circle"></i>
                </a>
            </div>
        </header>

        <div class="flex flex-grow">
            <!-- Sidebar -->
            <aside id="sidebar" class="w-64 bg-white shadow-md flex flex-col overflow-hidden transition-all duration-300 h-screen sticky top-20 z-40">
                @include('admin.layout.sidebar')
            </aside>

            <!-- Main Content -->
            <main class="flex-grow p-8 overflow-auto">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const sidebarHeader = document.getElementById('sidebarHeader');

        toggleSidebar.addEventListener('click', () => {
            if (sidebar.classList.contains('w-64')) {
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-16');
                sidebar.querySelectorAll('.sidebar-text').forEach(el => el.classList.add('hidden'));
                sidebarHeader.classList.add('hidden');
            } else {
                sidebar.classList.remove('w-16');
                sidebar.classList.add('w-64');
                sidebar.querySelectorAll('.sidebar-text').forEach(el => el.classList.remove('hidden'));
                sidebarHeader.classList.remove('hidden');
            }
        });
    </script>
</body>

</html>