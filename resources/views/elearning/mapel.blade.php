<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>LMS SATAS - Google Classroom</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <style>
    /* Custom shadow for the Detail button */
    .btn-shadow {
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
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
<body class="bg-white text-black font-sans">
  <header class="border-b border-black/10">
    <nav class="max-w-7xl mx-auto flex flex-wrap items-center justify-between px-4 sm:px-6 lg:px-8 py-3">
      <div class="flex items-center">
        <span class="font-extrabold text-black text-base select-none">LMS SATAS</span>
      </div>

      <!-- Mobile menu button -->
      <button id="mobile-menu-button" class="md:hidden flex items-center px-3 py-2 border rounded text-black border-black hover:text-blue-600 hover:border-blue-600">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Desktop Navigation -->
      <div class="hidden md:flex items-center space-x-6">
        <a href="#" class="text-sm text-black/80 hover:text-black">Home</a>
        <a href="#" class="text-sm text-black underline decoration-blue-600 decoration-2 underline-offset-4">
          E-Learning
        </a>
        <div class="ml-6">
          <button
            type="button"
            class="text-blue-600 text-sm flex items-center space-x-1 focus:outline-none"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <span>Danial Abror</span>
            <i class="fas fa-chevron-down text-xs ml-1"></i>
          </button>
        </div>
      </div>

      <!-- Mobile Navigation -->
      <div id="mobile-menu" class="mobile-menu w-full md:hidden mt-2">
        <div class="flex flex-col space-y-2 pb-3">
          <a href="#" class="text-sm text-black/80 hover:text-black py-2">Home</a>
          <a href="#" class="text-sm text-black underline decoration-blue-600 decoration-2 underline-offset-4 py-2">
            E-Learning
          </a>
          <div class="pt-2 border-t border-gray-200 mt-2">
            <button
              type="button"
              class="text-blue-600 text-sm flex items-center space-x-1 focus:outline-none"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <span>Danial Abror</span>
              <i class="fas fa-chevron-down text-xs ml-1"></i>
            </button>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
    <h2 class="font-bold text-base sm:text-lg mb-3">Google Classroom</h2>
    <section
      class="border border-gray-300 rounded-lg p-3 sm:p-4 md:p-6 space-y-4 sm:space-y-6"
      aria-label="Google Classroom courses"
    >
      <a href="#" class="inline-flex items-center text-blue-600 text-sm font-semibold mb-2 select-none hover:text-blue-800 transition-colors">
        <i class="fas fa-chevron-left mr-2"></i> Back
      </a>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-5">
        <!-- Card 1 -->
        <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
          <header class="bg-blue-400 px-3 sm:px-4 py-2 sm:py-3 rounded-t-lg text-white">
            <h3 class="font-bold text-sm sm:text-base leading-tight">Kimia X MIPA 1</h3>
            <p class="text-xs font-semibold leading-tight">Guy Hawkins, S.Pd.</p>
            <p class="text-xs text-opacity-90 font-normal leading-tight mt-0.5">34 students</p>
          </header>
          <div class="px-3 sm:px-4 py-2 sm:py-3 bg-white">
            <p class="text-xs font-semibold mb-0.5">Due Tuesday</p>
            <p class="text-xs text-gray-600 font-normal mb-3">11:59 PM - Kimia Task 8</p>
            <button
              type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded-full btn-shadow transition-colors"
            >
              Detail
            </button>
          </div>
        </article>

        <!-- Card 2 -->
        <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
          <header class="bg-red-500 px-3 sm:px-4 py-2 sm:py-3 rounded-t-lg text-white">
            <h3 class="font-bold text-sm sm:text-base leading-tight">Fisika X MIPA 1</h3>
            <p class="text-xs font-semibold leading-tight">Wade Warren, S.Pd., M.Pd</p>
            <p class="text-xs text-opacity-90 font-normal leading-tight mt-0.5">34 students</p>
          </header>
          <div class="px-3 sm:px-4 py-2 sm:py-3 bg-white">
            <p class="text-xs font-semibold mb-0.5">Due Tuesday</p>
            <p class="text-xs text-gray-600 font-normal mb-3">11:59 PM - Fisika Task 8</p>
            <button
              type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded-full btn-shadow transition-colors"
            >
              Detail
            </button>
          </div>
        </article>

        <!-- Card 3 -->
        <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
          <header class="bg-yellow-400 px-3 sm:px-4 py-2 sm:py-3 rounded-t-lg text-white">
            <h3 class="font-bold text-sm sm:text-base leading-tight">Biologi X MIPA 1</h3>
            <p class="text-xs font-semibold leading-tight">Jane Cooper, S.Pd.</p>
            <p class="text-xs text-opacity-90 font-normal leading-tight mt-0.5">34 students</p>
          </header>
          <div class="px-3 sm:px-4 py-2 sm:py-3 bg-white">
            <p class="text-xs font-semibold mb-0.5">Due Wednesday</p>
            <p class="text-xs text-gray-600 font-normal mb-3">11:59 PM - Biologi Task 8</p>
            <button
              type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded-full btn-shadow transition-colors"
            >
              Detail
            </button>
          </div>
        </article>

        <!-- Card 4 -->
        <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
          <header class="bg-lime-500 px-3 sm:px-4 py-2 sm:py-3 rounded-t-lg text-white">
            <h3 class="font-bold text-sm sm:text-base leading-tight">Agama X MIPA 1</h3>
            <p class="text-xs font-semibold leading-tight">Robert Fox, S.Pd.</p>
            <p class="text-xs text-opacity-90 font-normal leading-tight mt-0.5">34 students</p>
          </header>
          <div class="px-3 sm:px-4 py-2 sm:py-3 bg-white">
            <p class="text-xs font-semibold mb-0.5">Due Wednesday</p>
            <p class="text-xs text-gray-600 font-normal mb-3">11:59 PM - Agama Task 8</p>
            <button
              type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded-full btn-shadow transition-colors"
            >
              Detail
            </button>
          </div>
        </article>

        <!-- Card 5 -->
        <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
          <header class="bg-green-700 px-3 sm:px-4 py-2 sm:py-3 rounded-t-lg text-white">
            <h3 class="font-bold text-sm sm:text-base leading-tight">PPKn X MIPA 1</h3>
            <p class="text-xs font-semibold leading-tight">Cody Fisher, S.Pd.</p>
            <p class="text-xs text-opacity-90 font-normal leading-tight mt-0.5">34 students</p>
          </header>
          <div class="px-3 sm:px-4 py-2 sm:py-3 bg-white">
            <p class="text-xs font-semibold mb-0.5">Due Wednesday</p>
            <p class="text-xs text-gray-600 font-normal mb-3">11:59 PM - PPKn Task 8</p>
            <button
              type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded-full btn-shadow transition-colors"
            >
              Detail
            </button>
          </div>
        </article>

        <!-- Card 6 -->
        <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
          <header class="bg-teal-400 px-3 sm:px-4 py-2 sm:py-3 rounded-t-lg text-white">
            <h3 class="font-bold text-sm sm:text-base leading-tight">B. Indonesia X MIPA 1</h3>
            <p class="text-xs font-semibold leading-tight">Leslie Alexander, S.Pd., M.Pd.</p>
            <p class="text-xs text-opacity-90 font-normal leading-tight mt-0.5">34 students</p>
          </header>
          <div class="px-3 sm:px-4 py-2 sm:py-3 bg-white">
            <p class="text-xs font-semibold mb-0.5">Due Thursday</p>
            <p class="text-xs text-gray-600 font-normal mb-3">11:59 PM - B. Indonesia Task 8</p>
            <button
              type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded-full btn-shadow transition-colors"
            >
              Detail
            </button>
          </div>
        </article>

        <!-- Card 7 -->
        <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
          <header class="bg-cyan-600 px-3 sm:px-4 py-2 sm:py-3 rounded-t-lg text-white">
            <h3 class="font-bold text-sm sm:text-base leading-tight">Matematika X MIPA 1</h3>
            <p class="text-xs font-semibold leading-tight">Brooklyn Simmons, S.Pd.</p>
            <p class="text-xs text-opacity-90 font-normal leading-tight mt-0.5">34 students</p>
          </header>
          <div class="px-3 sm:px-4 py-2 sm:py-3 bg-white">
            <p class="text-xs font-semibold mb-0.5">Due Thursday</p>
            <p class="text-xs text-gray-600 font-normal mb-3">11:59 PM - Matematika Task 8</p>
            <button
              type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded-full btn-shadow transition-colors"
            >
              Detail
            </button>
          </div>
        </article>

        <!-- Card 8 -->
        <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
          <header class="bg-purple-600 px-3 sm:px-4 py-2 sm:py-3 rounded-t-lg text-white">
            <h3 class="font-bold text-sm sm:text-base leading-tight">English X MIPA 1</h3>
            <p class="text-xs font-semibold leading-tight">Darlene Robertson, S.Pd.</p>
            <p class="text-xs text-opacity-90 font-normal leading-tight mt-0.5">34 students</p>
          </header>
          <div class="px-3 sm:px-4 py-2 sm:py-3 bg-white">
            <p class="text-xs font-semibold mb-0.5">Due Friday</p>
            <p class="text-xs text-gray-600 font-normal mb-3">11:59 PM - English Task 8</p>
            <button
              type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded-full btn-shadow transition-colors"
            >
              Detail
            </button>
          </div>
        </article>

        <!-- Card 9 -->
        <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
          <header class="bg-pink-500 px-3 sm:px-4 py-2 sm:py-3 rounded-t-lg text-white">
            <h3 class="font-bold text-sm sm:text-base leading-tight">Seni Budaya X MIPA 1</h3>
            <p class="text-xs font-semibold leading-tight">Arlene McCoy, S.Pd.</p>
            <p class="text-xs text-opacity-90 font-normal leading-tight mt-0.5">34 students</p>
          </header>
          <div class="px-3 sm:px-4 py-2 sm:py-3 bg-white">
            <p class="text-xs font-semibold mb-0.5">Due Monday</p>
            <p class="text-xs text-gray-600 font-normal mb-3">11:59 PM - Seni Budaya Task 8</p>
            <button
              type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded-full btn-shadow transition-colors"
            >
              Detail
            </button>
          </div>
        </article>
      </div>
    </section>
  </main>

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
