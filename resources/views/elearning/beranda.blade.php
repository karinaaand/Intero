<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>LMS SATAS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <style>
    /* Custom underline for active nav item */
    .active-underline {
      border-bottom-width: 2px;
      border-bottom-color: #2563eb; /* Tailwind blue-600 */
    }
  </style>
</head>
<body class="bg-white">
    <nav class="flex items-center border-b border-gray-200 px-4 py-3">
    <div class="flex items-center pl-32 space-x-8">
    <div class="font-sans font-semibold text-black text-lg sm:text-xl">LMS SATAS</div>

        <a href="{{ route('home') }}"
        class="font-sans text-base pb-1 border-b-2 transition duration-200
        {{ request()->routeIs('home') ? 'text-blue-600 border-blue-600' : 'text-black border-transparent' }}">
            Home
        </a>

        <a href="{{ route('elearning.beranda') }}"
        class="font-sans text-base pb-1 border-b-2 transition duration-200
        {{ request()->routeIs('elearning.beranda') ? 'text-blue-600 border-blue-600' : 'text-black border-transparent' }}">
            E-Learning
        </a>
    </div>



        <div class="ml-auto pr-4">
            <a href="{{ route('elearning.connect') }}" class="font-sans text-blue-600 text-sm">Log in</a>
        </div>
      </nav>
  <main class="p-4 sm:p-6 max-w-7xl mx-auto">
    <h2 class="font-bold mb-4 text-base sm:text-lg">
      Google Classroom
    </h2>
    <section class="bg-white rounded-lg border border-gray-200 p-3 sm:p-4 md:p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
      <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <img alt="Classroom with students facing front and teacher" class="w-full h-32 sm:h-40 object-cover" src="https://storage.googleapis.com/a1aa/image/da90502e-de78-4ea2-514c-60e2b09c1a33.jpg"/>
        <div class="p-3 sm:p-4">
          <h3 class="font-bold text-sm mb-1">
            X MIPA 1
          </h3>
          <p class="text-xs mb-2 sm:mb-3">
            2024/2025
          </p>
          <p class="text-xs text-gray-700">
            Wali Kelas: Jenny Wilson, S.Pd
          </p>
        </div>
      </article>
      <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <img alt="Classroom with blackboard and students" class="w-full h-32 sm:h-40 object-cover" src="https://storage.googleapis.com/a1aa/image/56504650-89e3-41c6-c5c3-3391452c00b7.jpg"/>
        <div class="p-3 sm:p-4">
          <h3 class="font-bold text-sm mb-1">
            X MIPA 2
          </h3>
          <p class="text-xs mb-2 sm:mb-3">
            2024/2025
          </p>
          <p class="text-xs text-gray-700">
            Wali Kelas: Leslie Alexander, S.Pd
          </p>
        </div>
      </article>
      <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <img alt="Teacher presenting to students in classroom" class="w-full h-32 sm:h-40 object-cover" src="https://storage.googleapis.com/a1aa/image/6c8194db-e539-43a8-fa96-98e736a6e49c.jpg"/>
        <div class="p-3 sm:p-4">
          <h3 class="font-bold text-sm mb-1">
            X MIPA 3
          </h3>
          <p class="text-xs mb-2 sm:mb-3">
            2024/2025
          </p>
          <p class="text-xs text-gray-700">
            Wali Kelas: Wade Warren, S.Pd
          </p>
        </div>
      </article>
      <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <img alt="Back view of students sitting in classroom" class="w-full h-32 sm:h-40 object-cover" src="https://storage.googleapis.com/a1aa/image/b079b6e6-efe7-49c5-284d-339d7060308e.jpg"/>
        <div class="p-3 sm:p-4">
          <h3 class="font-bold text-sm mb-1">
            X IPS 1
          </h3>
          <p class="text-xs mb-2 sm:mb-3">
            2024/2025
          </p>
          <p class="text-xs text-gray-700">
            Wali Kelas: Brooklyn Simmons, S.Pd
          </p>
        </div>
      </article>
      <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <img alt="Group discussion in classroom" class="w-full h-32 sm:h-40 object-cover" src="https://storage.googleapis.com/a1aa/image/0c034306-37e5-4334-d10c-2d941146ac55.jpg"/>
        <div class="p-3 sm:p-4">
          <h3 class="font-bold text-sm mb-1">
            X IPS 2
          </h3>
          <p class="text-xs mb-2 sm:mb-3">
            2024/2025
          </p>
          <p class="text-xs text-gray-700">
            Wali Kelas: Robert Fox, S.Pd
          </p>
        </div>
      </article>
      <article class="rounded-lg border border-gray-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <img alt="Empty classroom with wooden desks" class="w-full h-32 sm:h-40 object-cover" src="https://storage.googleapis.com/a1aa/image/9d8c3f45-5fd1-48b1-b94b-f7eade542b56.jpg"/>
        <div class="p-3 sm:p-4">
          <h3 class="font-bold text-sm mb-1">
            X IPS 3
          </h3>
          <p class="text-xs mb-2 sm:mb-3">
            2024/2025
          </p>
          <p class="text-xs text-gray-700">
            Wali Kelas: Jacob Jones, S.Pd
          </p>
        </div>
      </article>
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

     // Toggle mobile menu
     document.getElementById("mobile-menu-button").addEventListener("click", function () {
        document.getElementById("mobile-menu").classList.toggle("active");
      });
  </script>
</body>
</html>
