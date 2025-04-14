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
    </head>
<body class="flex flex-col min-h-screen bg-white">
    @include('partials.navbar')
    <section class="relative flex items-center justify-center w-full h-screen text-white">
        <img class="absolute top-0 left-0 object-cover w-full h-full filter "
             src="{{ asset('img/layananpage.png') }}"alt="layanan">
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
        <div class="relative z-10 text-center">
            <h1 class="font-bold text-white text-7xl" style="font-family: 'Kanit', sans-serif;">LAYANAN</h1>
            <hr class="w-1/2 mx-auto my-4 border-t-2 border-white opacity-80">
            <p class="mt-4 text-lg text-white">Unit Kegiatan Mahasiswa Korps Sukarela Palang Merah Indonesia Unit Politeknik Negeri Jember</p>
        </div>
    </section>
    <div class="w-full bg-red-600 h-7"></div>
    <main class="container flex-1 mx-auto">
        <section class="p-5 bg-white rounded-lg">
            <div class="flex flex-col items-center justify-center p-6 py-12">
                <h2 class="text-3xl font-bold text-center">Layanan Kami</h2>
                <hr class="w-1/5 mx-auto mt-2 mb-2 border-t-2 border-black opacity-50">

                <div class="container px-4 py-6 mx-auto">
                    <div class="{{ count($layanans) <= 3 ? 'flex flex-wrap justify-center gap-6' : 'grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4' }}">
                        @foreach ($layanans as $layanan)
                        <div class="relative w-full overflow-hidden bg-center bg-cover md:h-[750px] aspect-[2/4] rounded-2xl max-w-sm"
                        style="background-image: url('{{ asset('storage/' . $layanan->foto_layanan) }}');">
                            <div class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center bg-black bg-opacity-50">
                                <h3 class="text-3xl font-bold text-white">{{ $layanan->nama_layanan }}</h3>
                                <div class="text-white [&_p]:text-white [&_li]:text-white [&_span]:text-white">
                                    {!! $layanan->deskripsi_layanan !!}
                                </div>
                            </div>
                            <div class="absolute p-8 transform -translate-x-1/2 bottom-4 left-1/2">
                                <a href="#"
                                   class="px-6 py-3 font-bold text-center text-white transition border border-red-600 rounded-lg hover:bg-red-600 hover:text-white whitespace-nowrap">
                                    LEARN MORE
                                </a>
                            </div>
                        </div>
                    @endforeach

                    </div>

                </div>
            </div>
        </section>

    </main>
    <div class="w-full bg-red-600 h-7"></div>
    @include('partials.footer')
</body>
</html>





