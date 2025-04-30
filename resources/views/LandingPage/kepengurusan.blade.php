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

    <body class="flex flex-col min-h-screen bg-gray-100">
        @include('partials.navbar')
        <section class="relative flex items-center justify-center w-full h-screen text-white">
            <img class="absolute top-0 left-0 object-cover w-full h-full filter "
                 src="{{ asset('img/kegiatan1.png') }}"alt="Kegiatan 1">
            <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-30"></div>
            <div class="relative z-10 text-center">
                <h1 class="font-bold text-white text-7xl" style="font-family: 'Kanit', sans-serif;">KEPENGURUSAN</h1>
                <hr class="w-1/2 mx-auto my-4 border-t-2 border-white opacity-80">
                <p class="mt-4 text-lg text-white">Unit Kegiatan Mahasiswa Korps Sukarela Palang Merah Indonesia Unit Politeknik Negeri Jember</p>
            </div>
        </section>
        <div class="w-full bg-red-600 h-7"></div>
        <main class="container flex-1 p-6 mx-auto">
            <section class="p-4 px-20 bg-white rounded-lg shadow-md">
                <div class="flex-grow mb-9">
                    <div class="px-3 py-2 mt-1 text-center">
                        <h1 class="mt-1 mb-2 text-3xl font-bold" style="font-family: sans-serif;">KEPENGURUSAN</h1>
                        <div class="flex flex-col items-center mt-3">
                            <img src="{{ asset('img/Lambang.png') }}" alt="lambang" class="w-40 h-30">
                            <h1 class="mt-2 font-bold text-l" style="font-family: sans-serif;">
                                UKM KSR POLITEKNIK NEGERI JEMBER
                            </h1>
                        </div>
                        <hr class="w-1/2 mx-auto mt-2 mb-2 border-t-2 border-black opacity-50">
                    </div>
                </div>

                <select id="filter"
                    class="w-full sm:w-auto px-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 bg-no-repeat bg-left bg-[url('https://example.com/icon.png')] appearance-none">
                    <option value="">Pengurus Angkatan : </option>
                </select>
                <div class="container px-4 py-8 mx-auto">
                    <div class="{{ count($pengurus) <= 3 ? 'flex flex-wrap justify-center gap-8' : 'grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3' }}">
                        @foreach($pengurus as $item)
                            <div class="flex flex-col items-center max-w-sm p-5 overflow-hidden bg-white border rounded-lg shadow-md">
                                <div class="flex justify-center w-full">
                                    <img src="{{ asset('storage/'.$item->anggota->foto) }}"
                                         alt="{{ $item->anggota->nama }}"
                                         class="object-cover max-w-[240px] h-auto rounded-md" />
                                </div>
                                <div class="pt-6 text-center">
                                    <h3 class="mb-2 text-xl font-bold text-black">{{ $item->anggota->nama }}</h3>
                                    <p class="mb-2 text-gray-800">{{ $item->jabatan->divisi->nama_divisi }} - {{ $item->jabatan->nama_jabatan }}</p>
                                    <p class="text-gray-600">Periode: {{ $item->periode->tahun_mulai }} - {{ $item->periode->tahun_selesai }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


            </section>

        </main>
        <div class="w-full bg-red-600 h-7"></div>


        @include('partials.footer')
    </body>







