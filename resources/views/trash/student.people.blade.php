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
                <span>Danial Abror</span>
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
                    <img alt="Google Classroom logo, a green chalkboard with a white silhouette of a person and a chalk" class="w-5 h-5" height="20"
                        src="https://storage.googleapis.com/a1aa/image/5ca9a9ff-8508-4395-c29a-4776abaa0693.jpg"
                        width="20" />
                    <span>Google Classroom</span>
                </div>
                <div class="flex items-center space-x-4 text-gray-600 text-sm font-normal">
                    <button aria-label="Add" class="p-1 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-plus"></i>
                    </button>
                    <div aria-label="User initial K"
                        class="w-8 h-8 rounded-full bg-purple-700 text-white flex items-center justify-center font-semibold text-sm">
                        K</div>
                </div>
            </header>

            <div class="flex flex-1 flex-col md:flex-row">
                <nav class="w-full md:w-44 border-t border-gray-200 md:border-t-0 md:border-r border-gray-200 bg-blue-50 rounded-b-xl md:rounded-bl-xl md:rounded-tr-none">
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
                                        <span class="truncate">Kimia X MIPA 1</span>
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="flex-1 flex flex-col">
                    <div class="flex space-x-4 p-4 border-b border-gray-200 overflow-x-auto">
                        <a href="#"
                            class="px-6 py-2 rounded-full border border-gray-400 text-gray-900 text-sm font-normal whitespace-nowrap">
                            Stream
                        </a>
                        <a href="#"
                            class="px-6 py-2 rounded-full border border-gray-400 text-gray-900 text-sm font-normal whitespace-nowrap">
                            Classwork
                        </a>
                        <a href="#"
                            class="px-6 py-2 rounded-full border border-blue-400 bg-blue-100 text-blue-700 text-sm font-normal whitespace-nowrap">
                            People
                        </a>
                    </div>

                    <div class="px-6 space-y-4 overflow-y-auto flex-1 min-h-0">
                        <!-- Teacher Section -->
                        <div class="mt-6">
                            <div class="text-sm font-semibold text-gray-700 mb-3">Teacher</div>
                            <div class="flex items-center space-x-3 border-b border-gray-300 pb-3 mb-6">
                                <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="text-sm font-normal text-gray-800">
                                    Guy Hawkins, S.Pd
                                </span>
                            </div>
                        </div>

                        <!-- Students Section -->
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <div class="text-sm font-semibold text-gray-700">Students</div>
                                <div class="text-xs text-gray-500">34 Students</div>
                            </div>
                            <div class="space-y-4 max-h-[300px] overflow-y-auto pr-2">
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Anisa Tri Haryani
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Danial Abror
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Eki Oktaviana R.
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Fadillah Aulia Rahman
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Hendra Saputra
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Intan Permata Sari
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Joko Widodo
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Kartika Dewi
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Lestari Putri
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Muhammad Rizal
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Nia Kurniawati
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Oki Setiawan
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Putri Ayu
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Qoriatul Aini
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Rian Saputra
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Sari Melati
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Taufik Hidayat
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Umi Salamah
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Vina Anggraini
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Wawan Setiawan
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Xenia Putri
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Yudha Pratama
                                    </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div aria-hidden="true" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="text-sm font-normal text-gray-800">
                                        Zainal Abidin
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Dropdown functionality
        const teachingBtn = document.getElementById('teaching-btn');
        const teachingDropdown = document.getElementById('teaching-dropdown');
        const teachingArrow = document.getElementById('teaching-arrow');

        const enrolledBtn = document.getElementById('enrolled-btn');
        const enrolledDropdown = document.getElementById('enrolled-dropdown');
        const enrolledArrow = document.getElementById('enrolled-arrow');

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

        enrolledBtn.addEventListener('click', () => {
            const isHidden = enrolledDropdown.classList.contains('hidden');

            if (isHidden) {
                enrolledDropdown.classList.remove('hidden');
                enrolledArrow.classList.add('rotate-180');
            } else {
                enrolledDropdown.classList.add('hidden');
                enrolledArrow.classList.remove('rotate-180');
            }
        });
    </script>
</body>

</html>
