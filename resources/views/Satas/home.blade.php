<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>SMA Negeri 1 Tasikmalaya</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    /* Hide mobile menu by default */
    .mobile-menu {
      display: none;
    }

    /* Show mobile menu when active */
    .mobile-menu.active {
      display: block;
    }
  </style>
</head>
<body class="bg-white text-gray-900">
  <!-- Header with background image -->
  <header class="relative w-full h-[400px] sm:h-[480px] md:h-[560px] lg:h-[640px] xl:h-[720px]">
    <img
      alt="Panoramic photo of SMA Negeri 1 Tasikmalaya school building with clear sky"
      class="w-full h-full object-cover brightness-[0.35]"
      loading="eager"
      src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh3LV8A2_dNA6tEDigtFt7Cp63UxQeIyFmMedR9fSIfZmAvuuSZ3I_otpZ2P7kIUEhOSt_RdxRrWRjpsTl35sk6sz9SQAxq6l72dLiO-abeXNiq3vFqxRC8cFCnFzJycxfjN1DlAjrOQzE/s1600/profile+sma+n+1+tasikmalaya.jpg"
    />
    <div class="absolute inset-0 flex flex-col">
      <!-- Top bar with logo and nav -->
      <div class="px-4 sm:px-6 md:px-10 lg:px-16 py-4">
        <div class="flex justify-between items-center">
          <div class="flex items-center space-x-3">
            <img
              alt="Logo of SMA Negeri 1 Tasikmalaya, yellow and blue emblem"
              class="w-10 h-10 sm:w-12 sm:h-12 object-contain"
              loading="lazy"
              src="//upload.wikimedia.org/wikipedia/id/thumb/4/44/Logo_SMAN_1_Tasikmalaya.png/250px-Logo_SMAN_1_Tasikmalaya.png"
            />
            <div class="text-white text-xs leading-tight font-semibold select-none">
             <div class="text-left md:text-left text-sm leading-snug">
                <p class="font-bold uppercase">SMA NEGERI 1 TASIKMALAYA</p>
                <p>Jl. Rumah Sakit No.28 Empangsari Tawang Kota<br/>Tasikmalaya</p>
            </div>
            </div>
          </div>

          <!-- Mobile menu button -->
          <button id="mobile-menu-button" class="md:hidden text-white hover:text-yellow-400 transition-colors">
            <i class="fas fa-bars text-xl"></i>
          </button>

          <!-- Desktop Navigation -->
          <nav class="hidden md:block">
            <ul class="flex space-x-6 lg:space-x-10 text-white text-sm font-normal select-none">
                <li>
                  <a class="active:text-yellow-400 transition-colors" href="{{ route('home') }}">
                    Home
                  </a>
                </li>
                <li>
                  <a class="active:text-yellow-400 transition-colors" href="#">Kurikulum</a>
                </li>
                <li>
                  <a class="active:text-yellow-400 transition-colors" href="#">Berita</a>
                </li>
                <li>
                  <a class="active:text-yellow-400 transition-colors" href="{{ route('elearning.beranda') }}">
                    E-Learning
                  </a>
                </li>
                <li>
                  <a class="active:text-yellow-400 transition-colors" href="#">Perpustakaan</a>
                </li>
              </ul>
          </nav>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="mobile-menu mt-4 md:hidden">
            <ul class="flex flex-col space-y-2 text-white text-sm font-normal select-none bg-black/30 p-3 rounded">
                <li>
                  <a class="active:text-yellow-400 transition-colors block py-1" href="{{ route('home') }}">Home</a>
                </li>
                <li>
                  <a class="active:text-yellow-400 transition-colors block py-1" href="#">Kurikulum</a>
                </li>
                <li>
                  <a class="active:text-yellow-400 transition-colors block py-1" href="#">Berita</a>
                </li>
                <li>
                  <a class="active:text-yellow-400 transition-colors block py-1" href="{{ route('elearning.beranda') }}">E-Learning</a>
                </li>
                <li>
                  <a class="active:text-yellow-400 transition-colors block py-1" href="#">Perpustakaan</a>
                </li>
              </ul>
        </div>
      </div>
      <!-- Centered text -->
    <div class="flex-grow flex flex-col justify-center items-center px-4 sm:px-6 text-center">
        <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-semibold leading-tight">
            Selamat Datang di SMA Negeri Tasikmalaya
        </h1>
        <p class="text-white text-2xl sm:text-2xl mt-4 font-normal">
        Unggul dalam Prestasi, Luhur dalam Budi Pekerti
        </p>
    </div>

    </div>
  </header>

  <main class="max-w-7xl mx-auto px-4 sm:px-6 md:px-10 lg:px-16 py-6 sm:py-10 bg-white">
    <section>
      <h2 class="text-blue-900 font-semibold text-lg sm:text-xl mb-2 select-none">
        Berita Terbaru
      </h2>
      <div class="border-b border-gray-300 w-14 mb-4 sm:mb-6"></div>
      <p class="text-gray-600 text-xs mb-4 sm:mb-8 select-none font-bold">
        — 29 April 2025
      </p>

      <!-- Kontainer Flex Horizontal -->
      <div class="flex gap-12 items-stretch">
        <!-- Grid Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 flex-1">
          <!-- CARD 1 -->
          <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
            <img
              alt="Kepsek SMAN 1 Tasikmalaya"
              class="w-full h-40 sm:h-48 object-cover"
              src="https://storage.googleapis.com/a1aa/image/e824b61d-937b-4767-73bc-3ca2e7259b06.jpg"
            />
            <div class="p-3 sm:p-4">
              <p class="text-gray-500 text-xs mb-1 select-none">
                <i class="far fa-calendar-alt mr-1"></i>29 April, 2025
              </p>
              <h3 class="text-blue-700 text-sm font-semibold leading-snug mb-1">
                Kepsek SMAN 1 Tasikmalaya Targetkan 90 Persen Siswa Masuk PTN
              </h3>
              <p class="text-gray-600 text-xs leading-tight">
                Dalam Satas Education Fair 2023 yang digelar di Indoor SMAN 1 Tasikmalaya menarik perhatian tak hanya siswa, tetapi juga orang tua dan guru. Lihat Selengkapnya...
              </p>
            </div>
          </article>

          <!-- CARD 2 -->
          <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
            <img
              alt="Prestasi siswa"
              class="w-full h-40 sm:h-48 object-cover"
              src="https://sman1-tasik.sch.id/wp-content/uploads/2025/03/prestasi1.jpg"
            />
            <div class="p-3 sm:p-4">
              <p class="text-gray-500 text-xs mb-1 select-none">
                <i class="far fa-calendar-alt mr-1"></i>26 April, 2025
              </p>
              <h3 class="text-blue-700 text-sm font-semibold leading-snug mb-1">
                SMAN 1 Tasikmalaya Kembali Torehkan Prestasi
              </h3>
              <p class="text-gray-600 text-xs leading-tight">
                Sekolah Menengah Tingkat Atas Negeri 1 Kota Tasikmalaya (SATAS) kembali merebut prestasi dalam ajang. Lihat Selengkapnya...
              </p>
            </div>
          </article>

          <!-- CARD 3 -->
          <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
            <img
              alt="Basket"
              class="w-full h-40 sm:h-48 object-cover"
              src="https://sman1-tasik.sch.id/wp-content/uploads/2025/03/basket.jpg"
            />
            <div class="p-3 sm:p-4">
              <p class="text-gray-500 text-xs mb-1 select-none">
                <i class="far fa-calendar-alt mr-1"></i>23 April, 2025
              </p>
              <h3 class="text-blue-700 text-sm font-semibold leading-snug mb-1">
                Prestasi Yang Sangat Luar Biasa Di Raih SMA Negeri 1 Kota Tasikmalaya
              </h3>
              <p class="text-gray-600 text-xs leading-tight">
                Dalam Dunia Prestasi Pendidikan adalah suatu modal utama untuk jenjang yang menunjang pendidikan yang mana sebagai prestasi. Lihat Selengkapnya...
              </p>
            </div>
          </article>
        </div>

        <!-- Tombol panah kanan (di sebelah kanan card ke-3) -->
        <div class="flex self-center">
          <button aria-label="Next news" class="text-blue-600 hover:text-blue-700 focus:outline-none transition-colors">
            <i class="fas fa-chevron-circle-right text-2xl"></i>
          </button>
        </div>
      </div>
    </section>
  </main>

  <footer class="bg-[#14213d] text-white py-6 px-4 sm:px-10">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center md:items-start space-y-6 md:space-y-0">

      <!-- Kiri: Logo -->
      <div class="pl-6 md:pl-24 flex-shrink-0">
        <img
          src="https://upload.wikimedia.org/wikipedia/id/thumb/4/44/Logo_SMAN_1_Tasikmalaya.png/250px-Logo_SMAN_1_Tasikmalaya.png"
          alt="Logo SMAN 1 Tasikmalaya"
          class="w-20 h-auto object-contain"
        />
      </div>

      <!-- Tengah: Informasi Sekolah -->
      <div class="text-center md:text-center text-sm leading-snug">
        <p class="font-bold uppercase">SMA NEGERI 1 TASIKMALAYA</p>
        <p>Jl. Rumah Sakit No.28 Empangsari Tawang Kota<br/>Tasikmalaya</p>
        <p class="mt-1">©Copyright © SMAN 1 TASIKMALAYA</p>
      </div>

      <!-- Kanan: Sosial Media dan Kontak -->
      <div class="text-center md:text-right text-sm space-y-2">
        <p class="font-semibold">Sosial Media</p>
        <div class="flex justify-center md:justify-end space-x-4 text-lg">
          <a href="#" class="hover:text-blue-500"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="hover:text-pink-500"><i class="fab fa-instagram"></i></a>
          <a href="#" class="hover:text-blue-400"><i class="fab fa-twitter"></i></a>
          <a href="#" class="hover:text-red-500"><i class="fab fa-youtube"></i></a>
        </div>
        <p>Email: <a href="mailto:info@sman1-tasik.sch.id" class="underline">info@sman1-tasik.sch.id</a></p>
        <p>(0265) 331690 / (0265) 314861</p>
      </div>

    </div>
  </footer>

  <!-- JavaScript for mobile menu toggle -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');

      mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('active');
      });
    });
  </script>
</body>
</html>
