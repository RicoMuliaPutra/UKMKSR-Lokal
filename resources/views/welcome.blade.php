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
        <section class="p-6 transition-all duration-700 delay-500 translate-y-10 bg-white opacity-0 scroll-animate">

            <h2 class="mb-4 text-3xl font-bold text-center">KAMI ADALAH ORGANISASI UKM KSR POLIJE.</h2>
            <p class="text-center text-gray-700">
              KSR PMI Unit POLIJE merupakan salah satu UKM di Politeknik Negeri Jember yang bergerak di bidang kemanusiaan dan kepalangmerahan.
            </p>
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
                <div class="relative w-full overflow-hidden bg-center bg-cover md:h-[750px] aspect-[2/4] shadow-lg hover:shadow-xl rounded-2xl max-w-sm transition-all duration-1000 delay-200 opacity-0 translate-y-10 scroll-animate"
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
        <h2 class="text-2xl font-bold text-center">BLOG</h2>
        <div class="px-4 mx-auto max-w-7xl">
            <div class="grid gap-8 pb-8 mt-12 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($blogs->take(3) as $blog)
                <div class="relative overflow-hidden transition-transform duration-1000 delay-200 bg-white border border-gray-200 shadow-lg group hover:scale-105 hover:shadow-2xl scroll-animate">
                    <img src="{{ asset('storage/'. $blog->images) }}" alt="{{ $blog->title }}" class="object-cover w-full h-48 rounded-t-lg">
                    <div class="p-6 flex flex-col justify-between min-h-[200px]">
                        <p class="flex items-center gap-1 mb-1 text-sm text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            {{ $blog->created_at->format('d M Y') }}
                        </p>

                        <div>
                            <p class="mb-2 text-xl font-bold text-black">
                                {{ $blog->title }}
                            </p>
                        </div>
                        <div class="mt-auto">
                            <hr class="mb-4 ml-0 transition-all duration-500 ease-in-out transform translate-y-4 border-t-2 opacity-0 border-gray-80 w-2/2 group-hover:translate-y-0 group-hover:opacity-100" />
                            <div class="transition-all duration-500 ease-in-out transform translate-y-6 opacity-0 group-hover:translate-y-0 group-hover:opacity-100">
                                <a href="{{ route('blog.detail', $blog->id) }}" class="font-bold text-blue-800 hover:underline">
                                    SELENGKAPNYA
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-4 text-center p-9">
            <a href="{{ route('bloging') }}"
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
                    <p class="mb-4 text-xl font-bold text-center opacity-0 animate-slide-right scroll-text">UKM Ter Aktif</p>
                    <p class="text-center text-gray-400 opacity-0 text-l animate-slide-right scroll-text">Menjadi UKM teraktif di Politeknik Negeri Jember</p>
                </div>

                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/icon/achivment.png') }}" alt="achivment" class="object-contain w-16 h-16 mb-4">
                    <p class="mb-4 text-xl font-bold text-center opacity-0 animate-slide-right scroll-text">15+ Tahun Berdiri</p>
                    <p class="text-center text-gray-400 opacity-0 text-l animate-slide-right scroll-text">Didirikan sejak tahun 2009</p>
                </div>

                <div class="flex flex-col items-center">
                    <img src="{{ asset('img/icon/group.png') }}" alt="group" class="object-contain w-16 h-16 mb-4">
                    <p class="mb-4 text-xl font-bold text-center opacity-0 animate-slide-right scroll-text">Tenaga Yang Profesional</p>
                    <p class="text-center text-gray-400 opacity-0 text-l animate-slide-right scroll-text">Dengan Ilmu dan sertifikasi yang terstandardisasi.</p>
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
          <h2 class="mb-6 text-2xl font-bold text-center text-gray-800 transition-all duration-700 translate-y-10 opacity-0 scroll-fade">
            Tonton Video Kami
          </h2>

          <div class="relative overflow-hidden transition-all duration-700 translate-y-10 shadow-lg opacity-0 rounded-xl group scroll-fade">

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
               class="px-6 py-3 font-bold text-gray-700 transition-all transition duration-700 translate-y-10 bg-transparent border-2 border-gray-400 opacity-0 text-l hover:border-sky-400 hover:text-sky-400 scroll-fade">
                Kontak Kami
            </a>
          </div>
        </div>
      </main>
    <div class="w-full bg-red-600 h-7"></div>







@include('partials.footer')

<style>
  html {
  scroll-behavior: smooth;}

  @keyframes slideRight {
        0% {
            opacity: 0;
            transform: translateX(50px);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-slide-right {
        transition: all 0.7s ease-out;
    }

    .scroll-text.visible {
        animation: slideRight 0.8s forwards;
    }
    .scroll-animate {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s ease-out;
}
.scroll-animate.show {
    opacity: 1;
    transform: translateY(0);
}

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
<script>
    document.addEventListener("DOMContentLoaded", function () {
      // Gabungan semua elemen target
      const scrollAnimateElements = document.querySelectorAll('.scroll-animate');
      const scrollTextElements = document.querySelectorAll('.scroll-text');
      const scrollFadeElements = document.querySelectorAll('.scroll-fade');

      // Buat satu observer untuk scroll-animate
      const animateObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.remove('opacity-0', 'translate-y-10');
            entry.target.classList.add('opacity-100', 'translate-y-0');
            animateObserver.unobserve(entry.target); // hanya animasi sekali
          }
        });
      }, { threshold: 0.1 });

      scrollAnimateElements.forEach(el => animateObserver.observe(el));

      // Observer untuk scroll-text
      const textObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            textObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.2 });

      scrollTextElements.forEach(el => textObserver.observe(el));

      // Observer untuk scroll-fade
      const fadeObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('opacity-100', 'translate-y-0');
            fadeObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.2 });

      scrollFadeElements.forEach(el => fadeObserver.observe(el));
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const elements = document.querySelectorAll(".scroll-animate");
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                    // Jika hanya ingin animasi sekali:
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        elements.forEach(el => observer.observe(el));
    });
</script>


</body>
</html>
