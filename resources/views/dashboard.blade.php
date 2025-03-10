
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
     </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>









    {{-- <x-app-layout>
        <div class="flex min-w-full min-h-screen">
            <div class="w-56 min-h-screen text-white bg-customBrown">
                <div class="p-4">
                    <h1 class="text-2xl font-bold">UKM KSR POLIJE</h1>
                </div>
                <ul class="mt-4">
                    <li class="mb-4">
                        <a href="" class="flex items-center p-2 text-sm font-medium rounded hover:bg-brown-500">
                            <img class="w-6 h-6 mr-2" src="" alt="Dashboard Icon">
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="" class="flex items-center p-2 text-sm font-medium rounded hover:bg-brown-500">
                            <img class="w-6 h-6 mr-2" src="}" alt="Pekerja Icon">
                            <span>Pekerja</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="\" class="flex items-center p-2 text-sm font-medium rounded hover:bg-brown-500">
                            <img class="w-6 h-6 mr-2" src="" alt="Blog Icon">
                            <span>Blog</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="flex items-center p-2 text-sm font-medium rounded hover:bg-brown-500">
                            <img class="w-6 h-6 mr-2" src="" alt="Laporan Icon">
                            <span>Deteksi</span>
                        </a>
                    </li>

                </ul>
            </div>


        </div>
    </x-app-layout>
 --}}
