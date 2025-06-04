<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Google Classroom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        html,
        body {
            height: 100%;
        }

        .modal {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body class="bg-white text-black w-full min-h-screen flex flex-col">

    <!-- Header -->
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

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto p-6 flex-1 w-full">
        <section class="border border-gray-200 rounded-xl overflow-hidden min-h-full flex flex-col">
            <header class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                <div class="flex items-center space-x-2 text-sm text-gray-800 font-normal">
                    <button aria-label="Menu" class="p-1 focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                    <img class="w-5 h-5"
                        src="https://storage.googleapis.com/a1aa/image/462926ac-071c-432d-8541-e45b01ea601f.jpg"
                        alt="Logo" />
                    <span>Google Classroom</span>
                </div>
                <div class="flex items-center space-x-4 text-gray-600 text-sm font-normal">
                    <div
                        class="w-8 h-8 rounded-full bg-purple-700 text-white flex items-center justify-center font-semibold text-sm">
                        G</div>
                </div>
            </header>

            <div class="flex flex-1 flex-col md:flex-row">
                <!-- Sidebar -->
                <nav
                    class="w-full md:w-44 border-t border-gray-200 md:border-t-0 md:border-r border-gray-200 bg-blue-50 rounded-b-xl md:rounded-bl-xl md:rounded-tr-none">
                    <ul class="py-2">
                        <li>
                            <button onclick="window.location.href='{{ route('elearning.home') }}'"
                                class="flex items-center w-full px-4 py-3 text-gray-900 text-sm font-normal hover:bg-blue-100">
                                <i class="fas fa-home text-gray-500 w-5 mr-3 text-center"></i>
                                <span>Home</span>
                            </button>
                        </li>
                        <li class="border-t border-gray-200">
                            <button
                                class="flex items-center w-full px-4 py-3 text-gray-900 text-sm font-normal hover:bg-blue-100">
                                <i class="fas fa-chalkboard-teacher text-gray-500 w-5 mr-3 text-center"></i>
                                <span>Teaching</span>
                            </button>
                        </li>
                        <li class="border-t border-gray-200">
                            <button
                                class="flex items-center w-full px-4 py-3 text-blue-600 text-sm font-normal bg-blue-100">
                                <i class="fas fa-graduation-cap text-blue-600 w-5 mr-3 text-center"></i>
                                <span>Enrolled</span>
                            </button>
                        </li>
                        <li class="border-t border-gray-200">
                            <button
                                class="flex items-center w-full px-4 py-3 text-gray-900 text-sm font-normal hover:bg-blue-100">
                                <i class="fas fa-users text-gray-500 w-5 mr-3 text-center"></i>
                                <span>Kimia X MIPA 1</span>
                            </button>
                        </li>
                    </ul>
                </nav>

                <!-- Main Content Area -->
                <div class="flex-1 p-6">
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Left side -->
                        <div class="flex-1">
                            <h2 class="text-gray-900 font-semibold text-lg leading-tight">
                                TUGAS BAB 1
                            </h2>
                            <p class="text-gray-600 text-xs mt-0.5">
                                15 May 2020 5:00 pm
                            </p>
                            <p class="text-gray-600 text-xs mt-0.5">
                                100 poin
                            </p>
                            <hr class="border-gray-300 my-4" />
                            <div class="flex border border-gray-300 rounded-md overflow-hidden max-w-md">
                                <div class="flex-1 flex items-center justify-center px-3 py-2">
                                    <div class="text-xs text-blue-600 break-all text-center w-full">
                                        <a href="#" class="hover:underline">https://googlefiles.nl/tank/glazingbab/quality.salpages</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="w-full md:w-80 border border-gray-300 rounded-xl p-5">
                            <h3 class="text-gray-900 font-semibold text-base mb-1">
                                Your Work
                            </h3>
                            <p class="text-gray-600 text-xs font-semibold mb-3">
                                Assigned
                            </p>
                            <label class="text-gray-700 text-xs mb-1 block" for="input-link">
                                Input your link
                            </label>
                            <input
                                class="w-full border border-gray-300 rounded-md text-xs text-gray-700 px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-600"
                                id="input-link" type="text" value="https://docs.googleapis.com/blog/babn/sigobild/" />
                            <button
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 rounded-md flex items-center justify-center space-x-2"
                                type="button">
                                <i class="fas fa-paper-plane"></i>
                                <span>Turn In</span>
                            </button>
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
