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
        body {
            font-family: 'Inter', sans-serif;
        }

        html,
        body {
            height: 100%;
        }

        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }

        .dropdown-menu {
            position: absolute;
            right: 0;
            margin-top: 0.5rem;
            min-width: 12rem;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            z-index: 50;
        }
    </style>
</head>

<body class="bg-white text-black w-full min-h-screen flex flex-col">
    <header class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
        <nav class="flex items-center space-x-8 text-sm font-semibold">
            <span>LMS SATAS</span>
            <a class="text-black" href="{{ route('home') }}">Home</a>
            <a class="text-blue-600 border-b-2 border-blue-600 pb-[6px]" href="{{ route('elearning.home') }}">E-Learning</a>
        </nav>
        <div class="flex items-center space-x-8 text-sm">
            <button id="refreshTokenBtn" class="text-green-700 font-normal hover:text-green-800">Refresh Token</button>
            <div class="flex items-center relative">
                <div aria-label="User initial" id="userInitial"
                    class="w-8 h-8 rounded-full bg-purple-700 text-white flex items-center justify-center font-semibold text-sm">
                </div>
                <button id="userDropdownBtn" class="flex items-center text-blue-600 font-normal space-x-1 ml-2">
                    <span id="userName">Loading...</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Toast notification -->
    <div id="toast" class="toast"></div>

    <main class="max-w-7xl mx-auto p-6 flex-1 w-full">
        <section class="border border-gray-200 rounded-xl overflow-hidden min-h-full flex flex-col">
            <header class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                <div class="flex items-center space-x-2 text-sm text-gray-800 font-normal">
                    <button aria-label="Menu" class="p-1 focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                    <img alt="Google Classroom logo" class="w-5 h-5" height="20"
                        src="https://www.gstatic.com/classroom/logo_square_rounded.svg" class="UAJaRc" alt="Google Classroom" data-iml="7900.70000000298" width="20">
                    <span>Google Classroom</span>
                </div>
                <div class="flex items-center space-x-4 text-gray-600 text-sm font-normal">
                    {{-- <button id="openModalBtn" aria-label="Add" class="p-2 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-plus text-lg"></i> <span class="ml-1">Buat Kelas</span>
                    </button> --}}
                    <div aria-label="User initial" id="secondaryUserInitial"
                        class="w-8 h-8 rounded-full bg-purple-700 text-white flex items-center justify-center font-semibold text-sm">
                    </div>
                </div>
            </header>

            <div class="flex flex-1">
                <nav class="w-44 border-r border-gray-200 bg-blue-50 rounded-bl-xl">
                    <ul class="py-2">
                        <li>
                            <button
                                class="flex items-center w-full px-4 py-3 text-gray-900 text-sm font-normal hover:bg-blue-100 rounded-bl-xl bg-blue-100">
                                <i class="fas fa-home text-gray-500 w-5 mr-3 text-center"></i>
                                <a class="text-black" href="{{ route('elearning.home') }}">Home</a>
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

                <div class="flex-1 p-8">
                    <div id="courseworkList">
                        <!-- Coursework content will be loaded here -->
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // User dropdown functionality
            const userDropdownBtn = document.getElementById('userDropdownBtn');
            const userNameElement = document.getElementById('userName');
            const userInitialElement = document.getElementById('userInitial');
            const secondaryUserInitialElement = document.getElementById('secondaryUserInitial');
            const loginUrl = "{{ route('elearning.login') }}";

            // Create user dropdown menu
            const userDropdownMenu = document.createElement('div');
            userDropdownMenu.className = 'hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 dropdown-menu';
            userDropdownMenu.innerHTML = `
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                <a href="${loginUrl}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
            `;
            userDropdownBtn.parentNode.appendChild(userDropdownMenu);

            // User dropdown toggle
            userDropdownBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isHidden = userDropdownMenu.classList.contains('hidden');

                if (isHidden) {
                    userDropdownMenu.classList.remove('hidden');
                } else {
                    userDropdownMenu.classList.add('hidden');
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!userDropdownBtn.contains(e.target) && !userDropdownMenu.contains(e.target)) {
                    userDropdownMenu.classList.add('hidden');
                }
            });

            // Toast functionality
            function showToast(message, isSuccess = true) {
                const toast = document.getElementById('toast');
                toast.textContent = message;
                toast.style.backgroundColor = isSuccess ? '#4CAF50' : '#f44336';
                toast.style.display = 'block';

                setTimeout(() => {
                    toast.style.display = 'none';
                }, 3000);
            }

            // Token management
            function getToken() {
                return localStorage.getItem('token');
            }

            function setToken(token) {
                localStorage.setItem('token', token);
            }

            function clearToken() {
                localStorage.removeItem('token');
            }

            function redirectToLogin() {
                clearToken();
                window.location.href = loginUrl;
            }

            // Fetch user data from API
            async function fetchUserData() {
                const token = getToken();
                if (!token) {
                    console.error('Token not found');
                    updateUserUI({
                        name: 'Guest User',
                        email: 'guest@example.com'
                    });
                    return;
                }

                try {
                    const baseUrl = "{{ env('VITE_API_BASE_URL', 'http://127.0.0.1:8000/api') }}";
                    const response = await axios.get(`${baseUrl}/user`, {
                        headers: {
                            Authorization: `Bearer ${token}`
                        }
                    });

                    const userData = response.data;
                    updateUserUI(userData);
                } catch (error) {
                    console.error('Failed to fetch user data:', error);
                    // Fallback if user data fetch fails
                    updateUserUI({
                        name: 'User',
                        email: 'user@example.com'
                    });
                }
            }

            // Update UI with user data
            function updateUserUI(userData) {
                if (userData.name) {
                    userNameElement.textContent = userData.name;

                    // Get initials from name
                    const initials = userData.name.split(' ')
                        .map(part => part[0])
                        .join('')
                        .toUpperCase()
                        .substring(0, 2);

                    userInitialElement.textContent = initials;
                    secondaryUserInitialElement.textContent = initials;
                } else if (userData.email) {
                    userNameElement.textContent = userData.email;
                    const initial = userData.email[0].toUpperCase();
                    userInitialElement.textContent = initial;
                    secondaryUserInitialElement.textContent = initial;
                }
            }

            // Initialize user data
            fetchUserData();

            // Refresh token button
            const refreshTokenBtn = document.getElementById('refreshTokenBtn');
            refreshTokenBtn.addEventListener('click', () => {
                redirectToLogin();
            });

            // Coursework functionality
            const courseId = window.location.pathname.split('/').pop();
            console.log(courseId);

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
                    const token = getToken();
                    if (!token) {
                        showToast('Authentication token not found. Please login again.', false);
                        redirectToLogin();
                        return;
                    }

                    const baseUrl = "{{ env('VITE_API_BASE_URL', 'http://127.0.0.1:8000/api') }}";
                    const response = await axios.get(`${baseUrl}/courses/${courseId}/coursework`, {
                        headers: {
                            Authorization: `Bearer ${token}`
                        }
                    });

                    const coursework = response.data;
                    renderCoursework(coursework);
                } catch (error) {
                    console.error('Gagal memuat coursework:', error);
                    document.getElementById('courseworkList').innerHTML =
                        '<div class="text-center py-8 text-red-500">Gagal memuat coursework</div>';

                    if (error.response?.status === 401) {
                        showToast('Session expired. Please login again.', false);
                        redirectToLogin();
                    } else {
                        showToast('Failed to load coursework. Please try again.', false);
                    }
                }
            }

            function renderCoursework(courseworkItems) {
                const container = document.getElementById('courseworkList');
                container.innerHTML = '';

                if (courseworkItems.length === 0) {
                    container.innerHTML = '<div class="text-center py-8 text-gray-500">Belum ada coursework</div>';
                    return;
                }

                courseworkItems.forEach(item => {
                    const itemElement = document.createElement('div');
                    itemElement.className = 'coursework-item mb-6 p-4 border border-gray-200 rounded-lg';
                    itemElement.innerHTML = `
                        <h3 class="font-semibold text-lg mb-2">${item.title}</h3>
                        <p class="text-gray-600 mb-3">${item.description || 'Tidak ada deskripsi'}</p>
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Due: ${item.dueDate || 'No due date'}</span>
                            <span>Status: ${item.status || 'Not submitted'}</span>
                        </div>
                    `;
                    container.appendChild(itemElement);
                });
            }

            // Teaching and enrolled dropdown functionality
            const teachingBtn = document.getElementById('teaching-btn');
            const teachingDropdown = document.getElementById('teaching-dropdown');
            const teachingArrow = document.getElementById('teaching-arrow');

            const enrolledBtn = document.getElementById('enrolled-btn');
            const enrolledDropdown = document.getElementById('enrolled-dropdown');
            const enrolledArrow = document.getElementById('enrolled-arrow');

            teachingBtn.addEventListener('click', () => {
                const isHidden = teachingDropdown.classList.contains('hidden');
                teachingDropdown.classList.toggle('hidden');
                teachingArrow.classList.toggle('rotate-180');

                // Close enrolled dropdown if open
                if (!enrolledDropdown.classList.contains('hidden')) {
                    enrolledDropdown.classList.add('hidden');
                    enrolledArrow.classList.remove('rotate-180');
                }
            });

            enrolledBtn.addEventListener('click', () => {
                const isHidden = enrolledDropdown.classList.contains('hidden');
                enrolledDropdown.classList.toggle('hidden');
                enrolledArrow.classList.toggle('rotate-180');

                // Close teaching dropdown if open
                if (!teachingDropdown.classList.contains('hidden')) {
                    teachingDropdown.classList.add('hidden');
                    teachingArrow.classList.remove('rotate-180');
                }
            });
        });
    </script>
</body>
</html>
