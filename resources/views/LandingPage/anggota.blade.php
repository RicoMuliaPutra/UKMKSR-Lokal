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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
<body class="flex flex-col min-h-screen bg-white">
    @include('partials.navbar')
    <main class="flex-grow pt-6">
        <section class="px-8 py-1 bg-white border-b fade-in">
            <div class="container mx-auto max-w-9xl">

                <div class="mb-10 text-center">
                    <h1 class="text-3xl font-bold leading-tight text-gray-800 animate__animated animate__fadeInUp">Anggota</h1>
                    <div class="w-64 h-1 mx-auto mt-4 bg-red-600 rounded-t bg-gradient-to-r from-orange-500 opacity-60"></div>
                </div>

                <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:space-x-2">
                    <select id="filter"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 sm:w-auto">
                        <option value="">Semua Angkatan</option>
                        @foreach ($daftarAngkatan as $tahun)
                        <option value="{{ $tahun }}" {{ request('angkatan') == $tahun ? 'selected' : '' }}>
                            {{ $tahun }}
                        </option>
                        @endforeach
                    </select>

                    <form action="{{ route('anggota.cari') }}" method="GET" class="flex flex-col w-full gap-2 sm:flex-row sm:items-center">
                        <input type="hidden" name="angkatan" value="{{ request('angkatan') }}">

                        <input type="text" name="query" placeholder="Cari Anggota..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 sm:w-auto"
                            value="{{ request('query') }}">

                        <button type="submit"
                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2.5 w-full sm:w-auto">
                            Cari
                        </button>
                    </form>
                    <script>
                        document.getElementById('filter').addEventListener('change', function () {
                            let filterValue = this.value;
                            window.location.href = `?angkatan=${filterValue}`;
                        });
                    </script>
                </div>


                <div class="grid grid-cols-1 gap-6 py-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($dataAnggota as $anggota)
                    <div class="flex flex-col items-center p-4 text-center transition duration-300 bg-white shadow rounded-xl hover:shadow-lg">
                        <div class="w-24 h-24 mb-4">
                            @if ($anggota->foto)
                            <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto {{ $anggota->nama }}"
                                 class="object-cover w-full h-full rounded-full ring-2 ring-red-400">
                            @else
                            <div class="flex items-center justify-center w-full h-full text-gray-500 bg-gray-200 rounded-full">-</div>
                            @endif
                        </div>
                        <h2 class="text-lg font-semibold text-gray-800">{{ $anggota->nama }}</h2>
                        <p class="text-sm text-gray-500">{{ $anggota->prodi }} • {{ $anggota->jurusan }}</p>
                        <p class="mt-1 text-sm text-gray-600">Angkatan: {{ $anggota->angkatan }} | {{ $anggota->jenis_kelamin }}</p>
                        <p class="mt-1 text-sm text-gray-600">  {{ $anggota->tahun_masuk_kuliah }}</p>
                        <span class="mt-3 inline-block px-3 py-1 text-xs font-medium rounded-full
                                     {{ $anggota->status == 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $anggota->status }}
                        </span>
                    </div>
                    @endforeach
                </div>

                {{-- <ul class="py-4 space-y-4">
                    @foreach ($dataAnggota as $anggota)
                    <li class="flex items-center p-4 transition bg-white rounded-lg shadow hover:bg-gray-50">
                        <div class="flex-shrink-0">
                            @if ($anggota->foto)
                            <img class="object-cover rounded-full w-14 h-14" src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto">
                            @else
                            <div class="flex items-center justify-center text-gray-500 bg-gray-200 rounded-full w-14 h-14">-</div>
                            @endif
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $anggota->nama }}</h3>
                            <p class="text-sm text-gray-600">
                                {{ $anggota->angkatan }} • {{ $anggota->jurusan }} • {{ $anggota->prodi }}
                            </p>
                            <p class="text-xs text-gray-500">Masuk: {{ $anggota->tahun_masuk_kuliah }} | {{ $anggota->status }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul> --}}





            </div>
        </section>
    </main>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        function showImage(imageUrl) {
            Swal.fire({
                imageUrl: imageUrl,
                imageWidth: 'auto',
                imageHeight: 'auto',
                imageAlt: 'Detail Foto',
                showConfirmButton: false,
                backdrop: true
            });
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const animatedEls = document.querySelectorAll('.animate-on-scroll');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.2
            });

            animatedEls.forEach(el => observer.observe(el));
        });
        </script>
</body>
</html>
