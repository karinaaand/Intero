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

</html>    --}}

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
                    const response = await fetch(/api/courses/${courseId}/coursework);
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
