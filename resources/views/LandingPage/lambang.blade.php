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
        @include('partials.navbar')
        <section class="relative flex items-center justify-center w-full h-screen text-white">
            <img class="absolute top-0 left-0 object-cover w-full h-full filter "
                 src="{{ asset('img/kegiatan1.png') }}"alt="Kegiatan 1">
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
            <div class="relative z-10 text-center">
                <h1 class="font-bold text-white text-7xl" style="font-family: 'Kanit', sans-serif;">LAMBANG</h1>
                <hr class="w-1/2 mx-auto my-4 border-t-2 border-white opacity-80">
                <p class="mt-4 text-lg text-white">Unit Kegiatan Mahasiswa Korps Sukarela Palang Merah Indonesia Unit Politeknik Negeri Jember</p>
            </div>
        </section>
        <div class="w-full bg-red-600 h-7"></div>
        <main class="container flex-1 p-6 mx-auto">
            <section class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex-grow">
                    <div class="px-3 py-8 mt-1 text-center">
                        <h1 class="mt-1 mb-2 text-4xl font-bold" style="font-family: sans-serif;">LAMBANG</h1>

                        <div class="flex flex-col items-center mt-3">
                            <img src="{{ asset('img/Lambang.png') }}" alt="lambang" class="w-40 h-30">
                            <h1 class="mt-2 text-xl font-bold" style="font-family: sans-serif;">
                                UKM KSR POLITEKNIK NEGERI JEMBER
                            </h1>
                        </div>
                        <hr class="w-1/2 mx-auto mt-2 mb-2 border-t-2 border-black opacity-50">
                    </div>

                    <section class="px-8 py-4 border-b fade-in">
                        <div class="container max-w-3xl mx-auto">
                            <div class="w-full p-4 rounded-lg">
                                <p class="ml-4 text-lg leading-relaxed text-justify" style="font-family: 'Kanit', sans-serif;">
                                    Lambang UKM KSR PMI Politeknik Negeri Jember sebagai relawan PMI adalah berbentuk
perisai dengan delapan sudut lancip yang berlandasan prinsip dasar pertama kali yang
dicetuskan di Indonesia, serta prinsip tambahan yang dimaksud yaitu Ketuhanan.
Didalamnya terdapat warna putih yang melambangkan kenetralan dan diatasnya tertulis
“KSR PMI” yang merupakan identitas Relawan, lambang intisari POLIJE dan tulisan
POLIJE dibawahnya sebagai identitas lembaga yang menaungi UKM KSR PMI Politeknik
Negeri Jember.
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </main>
        <div class="w-full bg-red-600 h-7"></div>


        @include('partials.footer')
    </body>







