{{--  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Google Classroom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        html,
        body {
            height: 100%;
        }
    </style>
</head>

<body class="bg-white text-black w-full min-h-screen flex flex-col">
    <header class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
        <nav class="flex items-center space-x-8 text-sm font-semibold">
            <span>LMS SATAS</span>
            <a class="text-black" href="#">Home</a>
            <a class="text-blue-600 border-b-2 border-blue-600 pb-[6px]" href="#">E-Learning</a>
        </nav>
        <div class="flex items-center space-x-8 text-sm">
            <a class="text-green-700 font-normal" href="#">Token Refresh</a>
            <button class="flex items-center text-blue-600 font-normal space-x-1">
                <span>Guy Hawkins, S.Pd</span>
                <i class="fas fa-chevron-down text-xs"></i>
            </button>
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-6 flex-1 w-full">
        <section class="border border-gray-200 rounded-xl overflow-hidden min-h-full flex flex-col">
            <header class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                <div class="flex items-center space-x-2 text-sm text-gray-800 font-normal">
                    <button aria-label="Menu" class="p-1 focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                    <img alt="Google Classroom logo" class="w-5 h-5" height="20"
                        src="https://storage.googleapis.com/a1aa/image/462926ac-071c-432d-8541-e45b01ea601f.jpg"
                        width="20" />
                    <span>Google Classroom</span>
                </div>
                <div class="flex items-center space-x-4 text-gray-600 text-sm font-normal">
                    <button aria-label="Add" class="p-1 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-plus"></i>
                    </button>
                    <div aria-label="User initial G"
                        class="w-8 h-8 rounded-full bg-purple-700 text-white flex items-center justify-center font-semibold text-sm">
                        G</div>
                </div>
            </header>

            <div class="flex flex-1">
                <nav class="w-44 border-r border-gray-200 bg-blue-50 rounded-bl-xl">
                    <ul class="py-2">
                        <li>
                            <button
                                class="flex items-center w-full px-4 py-3 text-gray-900 text-sm font-normal hover:bg-blue-100">
                                <i class="fas fa-home text-gray-500 w-5 mr-3 text-center"></i>
                                <span>Home</span>
                            </button>
                        </li>
                        <li class="border-t border-gray-200">
                            <div class="flex flex-col">
                                <button
                                    class="flex items-center justify-between w-full px-4 py-2.5 text-gray-900 text-sm font-normal hover:bg-blue-100 group"
                                    id="teaching-btn">
                                    <div class="flex items-center">
                                        <i class="fas fa-chalkboard-teacher text-blue-600 w-5 mr-3 text-center"></i>
                                        <span class="truncate">Teaching</span>
                                    </div>
                                    <i class="fas fa-chevron-down text-xs text-gray-500 group-hover:text-gray-700 transform transition-transform duration-200"
                                        id="teaching-arrow"></i>
                                </button>
                                <div class="pl-4 hidden" id="teaching-dropdown">
                                    <button
                                        class="flex items-center w-full px-3 py-2 text-gray-900 text-xs font-normal hover:bg-blue-100 rounded-lg teaching-class-btn">
                                        <div
                                            class="flex-shrink-0 flex items-center justify-center w-6 h-6 rounded-full bg-blue-600 text-white font-medium mr-2">
                                            K
                                        </div>
                                        <span class="truncate">Kimia X MIPA 1</span>
                                    </button>
                                </div>
                            </div>
                        </li>
                        <li class="border-t border-gray-200">
                            <div class="flex flex-col">
                                <button
                                    class="flex items-center justify-between w-full px-4 py-2.5 text-gray-900 text-sm font-normal hover:bg-blue-100 group"
                                    id="enrolled-btn">
                                    <div class="flex items-center">
                                        <i class="fas fa-graduation-cap text-blue-600 w-5 mr-3 text-center"></i>
                                        <span class="truncate">Enrolled</span>
                                    </div>
                                    <i class="fas fa-chevron-down text-xs text-gray-500 group-hover:text-gray-700 transform transition-transform duration-200"
                                        id="enrolled-arrow"></i>
                                </button>
                                <div class="pl-4 hidden" id="enrolled-dropdown">
                                    <button
                                        class="flex items-center w-full px-3 py-2 text-gray-900 text-xs font-normal hover:bg-blue-100 rounded-lg enrolled-class-btn">
                                        <div
                                            class="flex-shrink-0 flex items-center justify-center w-6 h-6 rounded-full bg-green-600 text-white font-medium mr-2">
                                            K
                                        </div>
                                        <span class="truncate">Kelas X KIR 1</span>
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="flex-1 flex flex-col">
                    <div class="flex space-x-4 p-4 border-b border-gray-200">
                        <a href="{{ route('elearning.teacher.stream') }}" class="px-6 py-2 rounded-full border border-gray-400 text-blue-900 text-sm font-normal">
                            Stream
                        </a>
                        <a href="{{ route('elearning.teacher.coursework') }}" class="px-6 py-2 rounded-full border border-blue-400 bg-blue-300 text-gray-900 text-sm font-normal">
                            Classwork
                        </a>
                        <a href="{{ route('elearning.teacher.people') }}" class="px-6 py-2 rounded-full border border-gray-400 text-gray-900 text-sm font-normal">
                            People
                        </a>
                        <a href="{{ route('elearning.teacher.grades') }}" class="px-6 py-2 rounded-full border border-gray-400 text-gray-900 text-sm font-normal">
                            Grades
                        </a>
                    </div>

                    <div class="p-6 flex-1">
                        <div class="flex justify-start mb-4 relative"> <!-- relative container -->
                            <button id="openModalBtn"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center">
                                <i class="fas fa-plus mr-2"></i> Create
                            </button>

                            <!-- Modal Dropdown -->
                            <div id="modal"
                                class="hidden absolute top-full left-0 mt-2 w-40 rounded-md border border-gray-300 bg-white shadow-sm flex flex-col space-y-1 p-2 z-50">
                                <a href="{{ route('elearning.teacher.coursework.assignment') }}"
                                class="flex items-center space-x-2 px-3 py-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                    <i class="fas fa-external-link-alt text-lg"></i>
                                    <span class="text-sm font-normal">Assignment</span>
                                </a>
                                <a href="{{ route('elearning.teacher.coursework.material') }}"
                                class="flex items-center space-x-2 px-3 py-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                    <i class="fas fa-external-link-alt text-lg"></i>
                                    <span class="text-sm font-normal">Assignment</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');
        const modal = document.getElementById('modal');

        openBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        // Optional: klik di luar modal untuk tutup modal
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    </script>

    <script>
        // Dropdown functionality
        const teachingBtn = document.getElementById('teaching-btn');
        const teachingDropdown = document.getElementById('teaching-dropdown');
        const teachingArrow = document.getElementById('teaching-arrow');

        teachingBtn.addEventListener('click', () => {
            const isHidden = teachingDropdown.classList.contains('hidden');

            if (isHidden) {
                teachingDropdown.classList.remove('hidden');
                teachingArrow.classList.add('rotate-180');
            } else {
                teachingDropdown.classList.add('hidden');
                teachingArrow.classList.remove('rotate-180');
            }
        });
    </script>

@section('scripts')
@endsection  --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Google Classroom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet" />
    <style>
        /* ... (styles dari kode sebelumnya) ... */
    </style>
</head>

<body class="bg-white text-black w-full min-h-screen flex flex-col">
    <!-- Header (sama seperti sebelumnya) -->
    <header class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
        <!-- ... (kode header sama) ... -->
    </header>

    <main class="max-w-7xl mx-auto p-6 flex-1 w-full">
        <section class="border border-gray-200 rounded-xl overflow-hidden min-h-full flex flex-col">
            <!-- ... (kode navigasi sama) ... -->

            <div class="flex-1 flex flex-col">
                <!-- Tab navigasi -->
                <div class="flex space-x-4 p-4 border-b border-gray-200">
                    <a href="{{ route('elearning.teacher.stream', $courseId ?? '') }}"
                        class="px-6 py-2 rounded-full border border-gray-400 text-gray-900 text-sm font-normal">
                        Stream
                    </a>
                    <a href="{{ route('elearning.teacher.coursework', $courseId ?? '') }}"
                        class="px-6 py-2 rounded-full border border-blue-400 bg-blue-300 text-gray-900 text-sm font-normal">
                        Classwork
                    </a>
                    <a href="{{ route('elearning.teacher.people', $courseId ?? '') }}"
                        class="px-6 py-2 rounded-full border border-gray-400 text-gray-900 text-sm font-normal">
                        People
                    </a>
                    <a href="{{ route('elearning.teacher.grades', $courseId ?? '') }}"
                        class="px-6 py-2 rounded-full border border-gray-400 text-gray-900 text-sm font-normal">
                        Grades
                    </a>
                </div>

                <div class="px-6 space-y-4">
                    <!-- Class Header -->
                    @if(isset($courseId) && isset($course))
                    <div class="bg-blue-400 rounded-lg p-6 w-full mt-6">
                        <h1 class="text-white font-semibold text-xl leading-tight">
                            {{ $course['name'] }}
                        </h1>
                        <p class="text-white font-semibold text-sm mt-1">
                            {{ $course['teacher'] }}
                        </p>
                    </div>
                    @endif

                    <!-- Coursework List -->
                    <div id="courseworkList" class="space-y-4">
                        <!-- Konten coursework akan dimuat di sini -->
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ... (modal dan toast sama seperti sebelumnya) ... -->

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const courseId = "{{ $courseId ?? '' }}";

            if (courseId) {
                // Load coursework untuk course tertentu
                loadCoursework(courseId);
            } else {
                // Tampilkan pesan atau redirect
                document.getElementById('courseworkList').innerHTML =
                    '<div class="text-center py-8 text-gray-500">Pilih kelas untuk melihat coursework</div>';
            }

            async function loadCoursework(courseId) {
                try {
                    // Implementasi pengambilan data coursework dari API
                    // Contoh:
                    const response = await fetch(`/api/courses/${courseId}/coursework`);
                    const coursework = await response.json();

                    renderCoursework(coursework);
                } catch (error) {
                    console.error('Gagal memuat coursework:', error);
                    document.getElementById('courseworkList').innerHTML =
                        '<div class="text-center py-8 text-red-500">Gagal memuat coursework</div>';
                }
            }

            function renderCoursework(courseworkItems) {
                // Implementasi rendering coursework
                const container = document.getElementById('courseworkList');
                container.innerHTML = '';

                if (courseworkItems.length === 0) {
                    container.innerHTML = '<div class="text-center py-8 text-gray-500">Belum ada coursework</div>';
                    return;
                }

                courseworkItems.forEach(item => {
                    const itemElement = document.createElement('div');
                    itemElement.className = 'coursework-item';
                    itemElement.innerHTML = `
                        <h3 class="font-semibold text-lg">${item.title}</h3>
                        <p class="text-gray-600">${item.description || 'Tidak ada deskripsi'}</p>
                        <!-- Tambahan informasi lainnya -->
                    `;
                    container.appendChild(itemElement);
                });
            }
        });
    </script>
</body>

</html>
