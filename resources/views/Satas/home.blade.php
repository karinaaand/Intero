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
              <p>SMA NEGERI 1 TASIKMALAYA</p>
              <p class="font-normal text-xs leading-tight mt-0.5">
                Jl. Rumah Sakit No.28 Empangsari Tawang Kota
                <br class="hidden sm:block"/>
                Tasikmalaya
              </p>
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
                <a class="text-yellow-400 hover:text-yellow-400 transition-colors" href="{{ route('home') }}">
                  Home
                </a>
              </li>
              <li>
                <a class="hover:text-yellow-400 transition-colors" href="#">
                  Kurikulum
                </a>
              </li>
              <li>
                <a class="hover:text-yellow-400 transition-colors" href="#">
                  Berita
                </a>
              </li>
              <li>
                <a class="text-yellow-400 hover:text-yellow-400 transition-colors" href="{{ route('elearning.beranda') }}">
                  E-Learning
                </a>
              </li>
              <li>
                <a class="hover:text-yellow-400 transition-colors" href="#">
                  Perpustakaan
                </a>
              </li>
            </ul>
          </nav>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="mobile-menu mt-4 md:hidden">
          <ul class="flex flex-col space-y-2 text-white text-sm font-normal select-none bg-black/30 p-3 rounded">
            <li>
              <a class="text-yellow-400 hover:text-yellow-400 transition-colors block py-1" href="{{ route('home') }}">
                Home
              </a>
            </li>
            <li>
              <a class="hover:text-yellow-400 transition-colors block py-1" href="#">
                Kurikulum
              </a>
            </li>
            <li>
              <a class="hover:text-yellow-400 transition-colors block py-1" href="#">
                Berita
              </a>
            </li>
            <li>
              <a class="text-yellow-400 hover:text-yellow-400 transition-colors block py-1" href="{{ route('elearning.beranda') }}">
                E-Learning
              </a>
            </li>
            <li>
              <a class="hover:text-yellow-400 transition-colors block py-1" href="#">
                Perpustakaan
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- Centered text -->
      <div class="flex-grow flex flex-col justify-center items-center px-4 sm:px-6 text-center">
        <h1 class="text-white font-semibold text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl leading-tight max-w-xs sm:max-w-lg">
          Selamat Datang di SMA Negeri 1 Tasikmalaya
        </h1>
        <p class="text-white text-xs sm:text-sm mt-2 sm:mt-4 font-semibold max-w-xs sm:max-w-sm">
          Unggul dalam Prestasi, Luhur dalam Budi Pekerti
        </p>
      </div>
    </div>
  </header>

  <!-- Main content -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 md:px-10 lg:px-16 py-6 sm:py-10 bg-white">
    <section>
      <h2 class="text-blue-900 font-semibold text-lg sm:text-xl mb-2 select-none">
        Berita Terbaru
      </h2>
      <div class="border-b border-gray-300 w-14 mb-4 sm:mb-6">
      </div>
      <p class="text-gray-600 text-xs mb-4 sm:mb-8 select-none">
        — 7 Mei 2025
      </p>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        <!-- Card 1 -->
        <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden w-full mx-auto">
          <img
            alt="Photo of Kepsek SMAN 1 Tasikmalaya wearing yellow garland talking to a student in uniform indoors"
            class="w-full h-40 sm:h-48 object-cover"
            loading="lazy"
            src="https://storage.googleapis.com/a1aa/image/e824b61d-937b-4767-73bc-3ca2e7259b06.jpg"
          />
          <div class="p-3 sm:p-4">
            <p class="text-gray-500 text-xs mb-1 select-none">
              29 April 2025
            </p>
            <h3 class="text-blue-700 text-sm font-semibold leading-snug mb-1">
              Kepsek SMAN 1 Tasikmalaya Targetkan 90 Persen Siswa Masuk PTN
            </h3>
            <p class="text-gray-600 text-xs leading-tight">
              Dalam Satuan Pendidikan Fair 2023 yang digelar di Indoor SMAN 1 Tasikmalaya menarik perhatian tak hanya siswa, tetapi juga orang tua dan guru. Lihat Selengkapnya...
            </p>
          </div>
        </article>

        <!-- Card 2 -->
        <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden w-full mx-auto">
          <img
            alt="Photo of three smiling students in white school uniforms posing outdoors"
            class="w-full h-40 sm:h-48 object-cover"
            loading="lazy"
            src="https://sman1-tasik.sch.id/wp-content/uploads/2025/03/prestasi1.jpg"
          />
          <div class="p-3 sm:p-4">
            <p class="text-gray-500 text-xs mb-1 select-none">
              26 April 2025
            </p>
            <h3 class="text-blue-700 text-sm font-semibold leading-snug mb-1">
              SMAN 1 Tasikmalaya Kembali Torehkan Prestasi
            </h3>
            <p class="text-gray-600 text-xs leading-tight">
              Sekolah Menengah Tingkat Atas Negeri 1 Kota Tasikmalaya (SMAN 1) kembali meraih prestasi dalam ajang. Lihat Selengkapnya...
            </p>
          </div>
        </article>

        <!-- Card 3 -->
        <article class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden w-full mx-auto">
          <img
            alt="Photo of two men indoors, one holding a trophy and the other congratulating him"
            class="w-full h-40 sm:h-48 object-cover"
            loading="lazy"
            src="https://sman1-tasik.sch.id/wp-content/uploads/2025/03/basket.jpg"
          />
          <div class="p-3 sm:p-4">
            <p class="text-gray-500 text-xs mb-1 select-none">
              25 April 2025
            </p>
            <h3 class="text-blue-700 text-sm font-semibold leading-snug mb-1">
              Prestasi Yang Sangat Luar Biasa Di Raih SMA Negeri 1 Kota Tasikmalaya
            </h3>
            <p class="text-gray-600 text-xs leading-tight">
              Dalam Dunia Prestasi Pendidikan adalah suatu modal utama untuk jenjang yang menunjang pendidikan yang mana sebagai prestasi Lihat Selengkapnya...
            </p>
          </div>
        </article>
      </div>
      <!-- Right arrow icon on the right side aligned vertically center -->
      <div class="flex justify-end mt-4 sm:mt-6">
        <button aria-label="Next news" class="text-blue-600 hover:text-blue-700 focus:outline-none transition-colors">
          <i class="fas fa-chevron-circle-right text-xl sm:text-2xl"></i>
        </button>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-6 sm:py-8 px-4 sm:px-6 md:px-10 lg:px-16">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center md:items-start space-y-6 md:space-y-0">
      <div class="flex items-center space-x-3">
        <img
          alt="Logo of SMA Negeri 1 Tasikmalaya, yellow and blue emblem"
          class="w-10 h-10 sm:w-12 sm:h-12 object-contain"
          loading="lazy"
          src="//upload.wikimedia.org/wikipedia/id/thumb/4/44/Logo_SMAN_1_Tasikmalaya.png/250px-Logo_SMAN_1_Tasikmalaya.png"
        />
        <div class="text-center md:text-left text-xs leading-tight select-none">
          <p class="font-semibold">
            SMA NEGERI 1 TASIKMALAYA
          </p>
          <p class="font-normal mt-0.5">
            Jl. Rumah Sakit No.28 Empangsari Tawang Kota
            <br class="hidden sm:block"/>
            Tasikmalaya
          </p>
        </div>
      </div>

      <div class="text-center text-xs select-none">
        <p>©Copyright SMAN 1 TASIKMALAYA</p>
      </div>

      <div class="flex flex-col items-center md:items-end space-y-2 sm:space-y-3 select-none">
        <p class="font-semibold mb-1">Sosial Media</p>
        <div class="flex space-x-4 text-white text-sm sm:text-base">
          <a aria-label="Facebook" class="hover:text-blue-500 transition-colors" href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a aria-label="Instagram" class="hover:text-pink-500 transition-colors" href="#">
            <i class="fab fa-instagram"></i>
          </a>
          <a aria-label="Twitter" class="hover:text-blue-400 transition-colors" href="#">
            <i class="fab fa-twitter"></i>
          </a>
        </div>
        <p class="text-xs mt-1 sm:mt-2 leading-tight">
          (0265) 311619 / 12065 134861
        </p>
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
