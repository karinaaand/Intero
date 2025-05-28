{{--  @extends('layouts.app')

@section('content')
<nav class="flex items-center justify-between border-b border-gray-200 px-4 sm:px-6 lg:px-32 py-3">
    <div class="flex items-center space-x-8">
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

    <div class="flex items-center space-x-4">
        <div id="user-name" class="font-sans text-sm">Loading...</div>
        <button id="logout-btn" class="font-sans text-sm text-red-600 hover:text-red-800">Logout</button>
    </div>
</nav>

<main class="p-4 sm:p-6 max-w-7xl mx-auto">

    <h2 class="font-bold mb-4 text-base sm:text-lg">
        Google Classroom
    </h2>

    <!-- Courses List -->
    <section id="courses-container" class="bg-white rounded-lg border border-gray-200 p-3 sm:p-4 md:p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        <div id="loading-courses" class="col-span-full text-center py-10">
            <p>Loading courses...</p>
        </div>

        <div id="no-courses" class="col-span-full text-center py-10 hidden">
            <p class="text-gray-500">No courses found</p>
        </div>

        <!-- Course cards will be inserted here -->
    </section>
</main>
@endsection

@section('scripts')
@endsection



  --}}

<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Google Classroom</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <body class="bg-white text-black">
  <header class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
   <nav class="flex items-center space-x-8 text-sm font-semibold">
    <span>LMS SATAS</span>
    <a class="text-black" href="#">Home</a>
    <a class="text-blue-600 border-b-2 border-blue-600 pb-[6px]" href="#">E-Learning</a>
   </nav>
   <div class="flex items-center space-x-8 text-sm">
    <a class="text-green-700 font-normal" href="#">Token Refresh</a>
    <button class="flex items-center text-blue-600 font-normal space-x-1">
     <span>Danial Abror</span>
     <i class="fas fa-chevron-down text-xs"></i>
    </button>
   </div>
  </header>

  <main class="max-w-7xl mx-auto p-6">
   <section class="border border-gray-200 rounded-xl overflow-hidden">
    <header class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
     <div class="flex items-center space-x-2 text-sm text-gray-800 font-normal">
      <button aria-label="Menu" class="p-1 focus:outline-none">
       <i class="fas fa-bars"></i>
      </button>
      <img alt="Google Classroom logo" class="w-5 h-5" height="20" src="https://storage.googleapis.com/a1aa/image/462926ac-071c-432d-8541-e45b01ea601f.jpg" width="20"/>
      <span>Google Classroom</span>
     </div>
     <div class="flex items-center space-x-4 text-gray-600 text-sm font-normal">
      <button aria-label="Add" class="p-1 hover:bg-gray-100 rounded-full">
       <i class="fas fa-plus"></i>
      </button>
      <div aria-label="User initial A" class="w-8 h-8 rounded-full bg-purple-700 text-white flex items-center justify-center font-semibold text-sm">A</div>
     </div>
    </header>
    <div class="flex min-h-[320px]">
     <nav class="w-44 border-r border-gray-200 bg-blue-50 rounded-bl-xl">
      <button class="flex items-center space-x-2 w-full px-4 py-3 text-gray-900 text-sm font-normal rounded-bl-xl bg-blue-100">
       <i class="fas fa-home"></i>
       <span>Home</span>
      </button>
     </nav>
     <div class="flex-1 flex flex-col items-center justify-center p-8">
      <img alt="Illustration" class="mb-4" height="120" src="https://storage.googleapis.com/a1aa/image/ec98a4dc-11a1-4e95-095f-eaf434d338ed.jpg" width="120"/>
      <p class="text-sm text-gray-700 mb-6">Tambahkan kelas untuk memulai</p>

      <!-- Ubah button ini agar memicu modal -->
      <button id="openModalBtn" class="bg-blue-600 text-white text-sm font-normal px-5 py-2 rounded-md hover:bg-blue-700 focus:outline-none">
       Buat Kelas
      </button>
     </div>
    </div>
   </section>
  </main>

  <!-- Modal overlay dan konten -->
  <div
    id="modal"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden"
  >
    <div
      class="max-w-md w-full bg-white rounded-xl p-6 shadow-sm relative"
      role="dialog"
      aria-modal="true"
      aria-labelledby="modalTitle"
    >
      <h2 id="modalTitle" class="text-gray-900 text-base font-normal mb-4">
        Create class
      </h2>

      <form id="classForm">
        <input
          id="className"
          type="text"
          placeholder="Class name (required)"
          class="w-full mb-4 px-4 py-3 bg-gray-200 placeholder-gray-500 text-gray-700 text-sm rounded-none border-b border-gray-400 focus:outline-none focus:ring-0 focus:border-gray-600"
          required
        />
        <input
          id="section"
          type="text"
          placeholder="Section"
          class="w-full mb-6 px-4 py-3 bg-gray-200 placeholder-gray-500 text-gray-700 text-sm rounded-none border-b border-gray-400 focus:outline-none focus:ring-0 focus:border-gray-600"
        />
        <div class="flex justify-end space-x-6 text-sm font-normal">
          <button
            type="button"
            id="cancelBtn"
            class="text-blue-600 hover:underline focus:outline-none"
          >
            Cancel
          </button>
          <button
            id="createBtn"
            type="submit"
            disabled
            class="text-gray-400 cursor-default"
          >
            Create
          </button>
        </div>
      </form>

      <button
        id="closeModalBtn"
        aria-label="Close modal"
        class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none"
      >
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>

  <script>
    const modal = document.getElementById('modal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const classNameInput = document.getElementById('className');
    const sectionInput = document.getElementById('section');
    const createBtn = document.getElementById('createBtn');
    const classForm = document.getElementById('classForm');

    // Buka modal saat tombol "Buat Kelas" ditekan dan isi data dummy
    openModalBtn.addEventListener('click', () => {
      modal.classList.remove('hidden');
      // Isi form dengan data dummy
      classNameInput.value = 'Kimia X MIPA 1';
      sectionInput.value = 'Guy Hawkins, S,Pd';
      // Aktifkan tombol Create
      createBtn.disabled = false;
      createBtn.classList.remove('text-gray-400', 'cursor-default');
      createBtn.classList.add('text-blue-600', 'hover:underline', 'cursor-pointer');
    });

    // Tutup modal saat tombol close (x) ditekan
    closeModalBtn.addEventListener('click', () => {
      modal.classList.add('hidden');
    });

    // Tutup modal saat tombol cancel ditekan
    cancelBtn.addEventListener('click', () => {
      modal.classList.add('hidden');
    });

    // Tutup modal kalau klik di luar area modal
    window.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.classList.add('hidden');
      }
    });

    classForm.addEventListener('submit', (e) => {
        e.preventDefault();
        // Redirect ke URL /guru
        window.location.href = '/guru';
    });


    // Aktifkan tombol Create jika Class Name terisi
    classNameInput.addEventListener('input', () => {
      if (classNameInput.value.trim() !== '') {
        createBtn.disabled = false;
        createBtn.classList.remove('text-gray-400', 'cursor-default');
        createBtn.classList.add('text-blue-600', 'hover:underline', 'cursor-pointer');
      } else {
        createBtn.disabled = true;
        createBtn.classList.add('text-gray-400', 'cursor-default');
        createBtn.classList.remove('text-blue-600', 'hover:underline', 'cursor-pointer');
      }
    });
  </script>
 </body>
</html>
