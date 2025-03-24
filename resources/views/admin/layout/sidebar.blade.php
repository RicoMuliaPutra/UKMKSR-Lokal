<!-- Sidebar -->
<aside id="sidebar" class="w-64 bg-white shadow-md flex flex-col transition-all duration-300 transform md:translate-x-0 -translate-x-full fixed md:relative min-h-screen h-auto overflow-y-auto z-40">
    <div id="sidebarHeader" class="text-center p-4 transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-500 mx-auto" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 12c2.5 0 4.5-2 4.5-4.5S14.5 3 12 3s-4.5 2-4.5 4.5S9.5 12 12 12zm0 2c-4 0-7 2-7 4v1h14v-1c0-2-3-4-7-4z" />
        </svg>
        <h2 class="text-lg font-semibold">Humas Polije</h2>
        <p class="text-gray-500 text-sm mb-6">Admin Humas</p>
        <hr class="border-gray-300">
    </div>

    <!-- Menu Navigasi -->
    <nav class="flex-grow p-4 space-y-1.5">
        <a href="/dashboard" class="flex items-center p-3 rounded-md hover:bg-gray-100">
            <img src="/img/icon/home.png" alt="Beranda Icon" class="h-4 w-4">
            <span class="ml-2 text-xs font-medium sidebar-text">Beranda</span>
        </a>
        <a href="{{ route('akun') }}" class="flex items-center p-2 rounded-md hover:bg-gray-100">
            <img src="/img/icon/user.png" alt="Akun Icon" class="h-6 w-6">
            <span class="ml-2 text-xs sidebar-text">Akun</span>
        </a>
        <a href="{{ route('anggota') }}" class="flex items-center p-3 rounded-md hover:bg-gray-100">
            <img src="/img/icon/multi.png" alt="Anggota Icon" class="h-5 w-5">
            <span class="ml-2 text-xs sidebar-text">Anggota</span>
        </a>

        <p class="text-gray-600 mt-3 text-[12px] font-semibold sidebar-text">Rekrutmen</p>
        <a href="{{ route('nilai') }}" class="flex items-center p-1 rounded-md hover:bg-gray-100">
            <img src="/img/icon/add.png" alt="Nilai Anggota Baru Icon" class="h-7 w-7">
            <span class="ml-2 text-xs sidebar-text">Nilai Anggota Baru</span>
        </a>
        <a href="{{ route('clustering') }}" class="flex items-center p-2 rounded-md hover:bg-gray-100">
            <img src="/img/icon/clust.png" alt="Clustering Icon" class="h-6 w-6">
            <span class="ml-2 text-xs sidebar-text">Clustering</span>
        </a>

        <p class="text-gray-600 mt-3 text-[12px] font-semibold sidebar-text">Landing Page</p>
        <a href="{{ route('tentang') }}" class="flex items-center p-2 rounded-md hover:bg-gray-100">
            <img src="/img/icon/tentang.png" alt="Tentang Icon" class="h-6 w-6">
            <span class="ml-2 text-xs sidebar-text">Tentang</span>
        </a>
        <a href="{{ route('kegiatan') }}" class="flex items-center p-2 rounded-md hover:bg-gray-100">
            <img src="/img/icon/kegiatan.png" alt="Kegiatan Icon" class="h-6 w-6">
            <span class="ml-2 text-xs sidebar-text">Kegiatan</span>
        </a>
        <a href="{{ route('layanan') }}" class="flex items-center p-2 rounded-md hover:bg-gray-100">
            <img src="/img/icon/layanan.png" alt="Layanan Icon" class="h-6 w-6">
            <span class="ml-2 text-xs sidebar-text">Layanan</span>
        </a>
        <a href="{{ route('blog') }}" class="flex items-center p-2 rounded-md hover:bg-gray-100">
            <img src="/img/icon/blog.png" alt="Blog Icon" class="h-6 w-6">
            <span class="ml-2 text-xs sidebar-text">Blog</span>
        </a>
        <a href="{{ route('galeri') }}" class="flex items-center p-2 rounded-md hover:bg-gray-100">
            <img src="/img/icon/galeri.png" alt="Galeri Icon" class="h-6 w-6">
            <span class="ml-2 text-xs sidebar-text">Galeri</span>
        </a>

        <a href="/logout" class="flex items-center p-2 rounded-md text-red-500 hover:bg-gray-100 mt-6">
            <img src="/img/icon/logout.png" alt="Logout Icon" class="h-6 w-6">
            <span class="ml-2 text-xs font-semibold sidebar-text">Keluar</span>
        </a>
    </nav>
</aside>