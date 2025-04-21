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
        <video id="myVideo" class="absolute top-0 left-0 object-cover w-full h-full" autoplay loop muted playsinline>
            <source src="{{asset('img/vt2.mp4')}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
        <div class="relative z-10 text-center">
            <h1 class="font-bold text-white text-7xl" style="font-family: 'Kanit', sans-serif;">UKM KSR PMI UNIT</h1>
            <h1 class="font-bold text-white text-7xl" style="font-family: 'Kanit', sans-serif;">POLITEKNIK NEGERI JEMBER</h1>
            <hr class="w-1/3 mx-auto my-4 border-t-2 border-white opacity-80">
            <p class="mt-4 text-lg text-white">Unit Kegiatan Mahasiswa Korps Sukarela Palang Merah Indonesia Unit Politeknik Negeri Jember</p>
        </div>
        <a href="#konten-berikutnya" class="absolute z-20 transform -translate-x-1/2 bottom-10 left-1/2 animate-bounce">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </a>
        <div class="absolute z-20 bottom-5 right-5">
            <button onclick="toggleVideo()" class="px-4 py-2 font-bold text-black rounded bg-white/70 hover:bg-white">
                ▶️ / ⏸️
            </button>
        </div>
    </section>

    <main class="flex-1 w-full mx-auto" id="konten-berikutnya">
        <section class="p-6 bg-white rounded-lg">
            <section  class="p-6 bg-white rounded-lg">
            <h2 class="mb-4 text-3xl font-bold text-center">KAMI ADALAH ORGANISASI UKM KSR POLIJE.</h2>
            <p class="text-center text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="mt-4 text-center p-9">
                <a href=""
                   class="px-6 py-3 font-bold text-gray-700 transition bg-transparent border-2 border-gray-400 rounded-lg hover:border-sky-400 hover:text-sky-400">
                    TENTANG KAMI
                </a>
            </div>
        </section>
    </main>

    <main class="flex-1 w-full p-6 bg-gray-100">
        <h2 class="mb-4 text-2xl font-bold text-center">LAYANAN KAMI</h2>
        <div class="px-4 py-6 mx-auto max-w-7xl">
            @php $layoutClass = count($layanans) <= 3
                ? 'flex flex-wrap justify-center gap-6'
                : 'grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4';
            @endphp

            <div class="{{ $layoutClass }}">
                @foreach ($layanans as $layanan)
                    <div class="relative w-full overflow-hidden bg-center bg-cover md:h-[750px] aspect-[2/4]  shadow-lg hover:shadow-xl rounded-2xl max-w-sm"
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
    </main>

    <main class="flex-1 w-full p-6 bg-gray-50">
        <h2 class="text-2xl font-bold text-center ">BLOG</h2>
        <div class="px-4 mx-auto max-w-7xl">
            <div class="grid gap-8 mt-12 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($blogs->take(3) as $blog)
                    <div class="transition-shadow duration-300 bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl">
                        <img src="{{ asset('storage/' . $blog->images) }}" alt="{{ $blog->title }}" class="object-cover w-full h-48">
                        <div class="relative p-6">
                            <p class="mb-2 text-xl font-bold text-black">{{ $blog->title }}</p>
                            <p class="mb-4 text-gray-800">{!! $blog->description !!}</p>
                            <div class="mt-4 text-center p-9">
                                <a href="{{ route('blog.show', $blog->id) }}"
                                   class="px-6 py-3 font-bold text-red-500 transition bg-transparent border-2 border-red-600 rounded-lg hover:bg-red-600 hover:text-white">
                                    LEARN MORE
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-4 text-center p-9">
            <a href="{{route('bloging')}}"
               class="px-6 py-3 font-bold text-gray-700 transition bg-transparent border-2 border-gray-400 rounded-lg hover:border-sky-400 hover:text-sky-400">
                GO TO BLOG
            </a>
        </div>
    </main>
    <main class="flex-1 w-full bg-gray-50">
        <section class="relative flex flex-col items-center justify-center w-full text-white min-h-[55vh] px-4 md:px-10 py-10">
            <img class="absolute top-0 left-0 object-cover w-full h-full"
                 src="{{ asset('img/bg4.jpg') }}" alt="Kegiatan 1">
                 <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
            <div class="relative z-10 mb-6 text-center">
                <h1 class="text-3xl font-bold text-white">Mengapa Kami?</h1>
                <hr class="w-1/2 mx-auto my-4 border-t-2 border-white opacity-50">
            </div>

            <div class="relative z-10 grid grid-cols-1 mt-6 md:grid-cols-3 gap-y-10 gap-x-12">

                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/icon/image.png') }}" alt="image" class="object-contain w-16 h-16 mb-4">
                    <p class="mb-4 text-xl font-bold text-center">UKM Ter Aktif</p>
                    <p class="text-center text-gray-400 text-l">Menjadi UKM teraktif di Politeknik Negeri Jember</p>
                </div>

                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/icon/achivment.png') }}" alt="achivment" class="object-contain w-16 h-16 mb-4">
                    <p class="mb-4 text-xl font-bold text-center">15+ Tahun Berdiri</p>
                    <p class="text-center text-gray-400 text-l">Didirikan sejak tahun 2009</p>
                </div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/icon/group.png') }}" alt="group" class="object-contain w-16 h-16 mb-4">
                    <p class="mb-4 text-xl font-bold text-center">Tenaga Yang Profesional</p>
                    <p class="text-center text-gray-400 text-l">Dengan Ilmu dan sertifikasi yang terstandardisasi.</p>
                </div>
            </div>
        </section>
    </main>

    <main class="flex-1 w-full p-6 bg-black">
        <div class="">
            <h2 class="text-2xl font-bold text-center text-white">GALERI</h2>
        </div>
    </main>

    <div class="w-full bg-red-600 h-7"></div>
    <main class="flex-1 w-full p-4 bg-gray-100">
        <div class="max-w-3xl mx-auto">
          <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Tonton Video Kami</h2>
          <div class="relative overflow-hidden shadow-lg rounded-xl group">
            <img
              src="https://img.youtube.com/vi/Zyujq5QNC4g/hqdefault.jpg"
              alt="Thumbnail Video"
              class="object-cover w-full"
            />
            <a href="https://youtu.be/Zyujq5QNC4g?si=brdUohg2TOmpWxE5" target="_blank" rel="noopener noreferrer"
               class="absolute inset-0 flex items-center justify-center">
              <div class="flex items-center justify-center w-16 h-16 transition bg-white rounded-full shadow-lg bg-opacity-70 group-hover:scale-105">
                <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M8 5v14l11-7z" />
                </svg>
              </div>
            </a>
            <div class="absolute top-0 left-0 right-0 flex items-center justify-between px-4 py-3 text-white bg-gradient-to-b from-black/80 to-transparent">
                <span id="yt-title" class="text-sm sm:text-base font-semibold truncate max-w-[70%]">Memuat judul...</span>
                <button onclick="navigator.share({ title: 'Tonton Video', url: 'https://youtu.be/Zyujq5QNC4g?si=brdUohg2TOmpWxE5' })"
                  class="px-3 py-1 text-xs text-gray-800 transition bg-white rounded-full sm:text-sm hover:bg-gray-100">
                  🔗 Bagikan
                </button>
              </div>
        </div>
        <div class="mt-4 text-center p-9">
            <a href=""
               class="px-6 py-3 font-bold transition bg-transparent border-2 border-gray-400 text-l gray-700 text- hover:border-sky-400 hover:text-sky-400">
                Kontak Kami
            </a>
        </div>
      </main>
    <div class="w-full bg-red-600 h-7"></div>










@include('partials.footer')

<style>
  html {
  scroll-behavior: smooth;}
</style>

<script>
    function toggleVideo() {
      const video = document.getElementById("myVideo");
      if (video.paused) {
        video.play();
      } else {
        video.pause();
      }
    }

    fetch("https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v=Zyujq5QNC4g&format=json")
      .then(res => res.json())
      .then(data => {
        document.getElementById("yt-title").textContent = data.title;
      })
      .catch(() => {
        document.getElementById("yt-title").textContent = "Gagal memuat judul";
      });
</script>

</body>
</html>
