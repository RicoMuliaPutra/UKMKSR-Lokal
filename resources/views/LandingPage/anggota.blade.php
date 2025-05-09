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
    <main class="flex-grow pt-6">
        <section class="px-8 py-1 bg-white border-b fade-in">
            <div class="container mx-auto max-w-9xl">

                <div class="mb-10 text-center">
                    <h1 class="text-3xl font-bold leading-tight text-gray-800">Anggota</h1>
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


                <div class="relative mb-4 overflow-x-auto shadow-md sm:rounded-lg ">
                    <table class="w-full text-sm text-left text-black rtl:text-right">
                        <thead class="text-xs text-black uppercase bg-white border-b border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Angkatan</th>
                                <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                                <th scope="col" class="px-6 py-3">Jurusan</th>
                                <th scope="col" class="px-6 py-3">Prodi</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Tahun Masuk Kuliah</th>
                                <th scope="col" class="px-6 py-3">Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataAnggota as $key => $anggota)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 text-center border-r">{{ $key + 1 }}</td>
                                <td class="px-4 py-2 border-r">{{ $anggota->nama }}</td>
                                <td class="px-4 py-2 border-r">{{ $anggota->angkatan }}</td>
                                <td class="px-4 py-2 border-r">{{ $anggota->jenis_kelamin }}</td>
                                <td class="px-4 py-2 border-r">{{ $anggota->jurusan }}</td>
                                <td class="px-4 py-2 border-r">{{ $anggota->prodi }}</td>
                                <td class="px-4 py-2 border-r">{{ $anggota->status }}</td>
                                <td class="px-4 py-2 border-r">{{ $anggota->tahun_masuk_kuliah }}</td>
                                <td class="px-4 py-2 text-center border-r">
                                    @if ($anggota->foto)
                                        <img src="{{ asset('storage/' . $anggota->foto) }}"
                                             alt="Gambar Anggota"
                                             class="object-cover w-20 h-20 rounded cursor-pointer"
                                             onclick="showImage('{{ asset('storage/' . $anggota->foto) }}')">
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
</body>
</html>
