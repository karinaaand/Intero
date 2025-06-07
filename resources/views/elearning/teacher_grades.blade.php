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
                    {{--  <button aria-label="Add" class="p-1 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-plus"></i>
                    </button>  --}}
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

                <div class="flex-1 flex flex-col">
                    <!-- Tambahkan tab navigation seperti di kode kedua -->
                    <div class="flex space-x-4 p-4 border-b border-gray-200" id="navTabs">
                        {{--  <a href="{{ route('elearning.teacher.stream') }}" class="px-6 py-2 rounded-full border border-gray-400 text-blue-900 text-sm font-normal">
                            Stream
                        </a>  --}}
                        {{--  <a href="{{ route('elearning.teacher.coursework/{courseId}') }}" class="px-6 py-2 rounded-full border border-blue-400 bg-blue-300 text-gray-900 text-sm font-normal">
                            Classwork
                        </a>
                        <a href="{{ route('elearning.teacher.people') }}" class="px-6 py-2 rounded-full border border-gray-400 text-gray-900 text-sm font-normal">
                            People
                        </a>
                        <a href="{{ route('elearning.teacher.grades/{courseId}') }}" class="px-6 py-2 rounded-full border border-gray-400 text-gray-900 text-sm font-normal">
                            Grades
                        </a>  --}}
                    </div>

                    <div class="flex-1 flex flex-col">
                    <div class="px-6 py-4">
                        <div class="flex justify-between items-center border-b border-gray-300 pb-2 mb-4">
                            <h2 class="font-semibold text-lg">Assigned</h2>
                            <span class="text-sm">4 Students</span>
                        </div>
                        <ul class="space-y-4">
                            <li class="flex items-center space-x-4">
                                <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-600"></i>
                                </div>
                                <a href="#"
                                    class="text-sm hover:underline">Anisa Tri Haryani</a>
                            </li>
                            <li class="flex items-center space-x-4">
                                <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-600"></i>
                                </div>
                                <a href="#"
                                    class="text-sm hover:underline">Danial Abror</a>
                            </li>
                            <li class="flex items-center space-x-4">
                                <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-600"></i>
                                </div>
                                <a href="#"
                                    class="text-sm hover:underline">Eki Oktaviana R.</a>
                            </li>
                            <li class="flex items-center space-x-4">
                                <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-600"></i>
                                </div>
                                <a href="#"
                                    class="text-sm hover:underline">Fadillah Aulia Rahman</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <aside class="w-80 p-6 border-l border-gray-300 bg-white">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900">
                                Anisa Tri Haryani
                            </h3>
                            <p class="text-xs text-gray-500">
                                No grade
                            </p>
                        </div>
                        <button aria-label="Close" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="mb-4">
                        <img alt="Document preview" class="w-30 h-24 rounded-md mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/3a51bb0d-0de6-4663-4118-1c073f47ab18.jpg" width="120"/>
                        <a class="text-xs text-blue-600 break-all" href="https://docs.google.com/document/d/">
                            https://docs.google.com/document/d/
                        </a>
                    </div>
                    <div class="mb-2 text-xs font-semibold text-gray-700">
                        Grades
                    </div>
                    <select aria-label="Grades dropdown" class="w-full rounded-lg bg-gray-200 px-4 py-2 mb-6 text-sm font-normal text-gray-900 appearance-none cursor-pointer">
                        <option>100</option>
                    </select>
                    <button
                        onclick="window.location.href='{{ route('elearning.teacher.people') }}'"
                        class="w-full bg-blue-700 text-white rounded-lg py-3 text-sm font-normal hover:bg-blue-800 focus:outline-none">
                        Assign Grade
                    </button>
                </aside>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Extract courseId from URL
        const pathSegments = window.location.pathname.split('/');
        const courseId = pathSegments[pathSegments.length - 1];

        // ==================== USER DROPDOWN FUNCTIONALITY ====================
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
            userDropdownMenu.classList.toggle('hidden');
        });

        // ==================== SIDEBAR DROPDOWN FUNCTIONALITY ====================
        // Teaching dropdown
        const teachingBtn = document.getElementById('teaching-btn');
        const teachingDropdown = document.getElementById('teaching-dropdown');
        const teachingArrow = document.getElementById('teaching-arrow');

        teachingBtn.addEventListener('click', () => {
            teachingDropdown.classList.toggle('hidden');
            teachingArrow.classList.toggle('rotate-180');
        });

        // Enrolled dropdown
        const enrolledBtn = document.getElementById('enrolled-btn');
        const enrolledDropdown = document.getElementById('enrolled-dropdown');
        const enrolledArrow = document.getElementById('enrolled-arrow');

        enrolledBtn.addEventListener('click', () => {
            enrolledDropdown.classList.toggle('hidden');
            enrolledArrow.classList.toggle('rotate-180');
        });

        // ==================== NAVIGATION TABS ====================
        const navTabs = document.getElementById('navTabs');

        const routes = [
            { name: 'Classwork', url: `/elearning/teacher/coursework/${courseId}`, active: false },
            { name: 'People', url: `/elearning/teacher/people/${courseId}`, active: true },
            { name: 'Grades', url: `/elearning/teacher/grades/${courseId}`, active: false }
        ];

        routes.forEach(route => {
            const a = document.createElement('a');
            a.href = route.url;
            a.textContent = route.name;
            a.className = `px-6 py-2 rounded-full border text-sm font-normal ${
                route.active
                    ? 'border-blue-400 bg-blue-300 text-gray-900'
                    : 'border-gray-400 text-gray-900'
            }`;
            navTabs.appendChild(a);
        });

        // ==================== TOAST FUNCTIONALITY ====================
        function showToast(message, isSuccess = true) {
            const toast = document.getElementById('toast');
            if (!toast) return;

            toast.textContent = message;
            toast.style.backgroundColor = isSuccess ? '#4CAF50' : '#f44336';
            toast.style.display = 'block';

            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        }

        // ==================== TOKEN MANAGEMENT ====================
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

        // ==================== USER DATA FETCHING ====================
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
                updateUserUI({
                    name: 'User',
                    email: 'user@example.com'
                });
            }
        }

        function updateUserUI(userData) {
            if (!userNameElement || !userInitialElement || !secondaryUserInitialElement) return;

            if (userData.name) {
                userNameElement.textContent = userData.name;
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

        // ==================== STUDENT LIST FUNCTIONALITY ====================
        // Add click handlers for student list items
        document.querySelectorAll('ul.space-y-4 li').forEach(item => {
            item.addEventListener('click', function() {
                // Remove active class from all items
                document.querySelectorAll('ul.space-y-4 li').forEach(i => {
                    i.classList.remove('bg-blue-50');
                });

                // Add active class to clicked item
                this.classList.add('bg-blue-50');

                // Here you would typically fetch and display the student details
                // For now, we'll just show the sidebar
                document.querySelector('aside').classList.remove('hidden');
            });
        });

        // Close sidebar button
        const closeSidebarBtn = document.querySelector('aside button[aria-label="Close"]');
        if (closeSidebarBtn) {
            closeSidebarBtn.addEventListener('click', function() {
                document.querySelector('aside').classList.add('hidden');
            });
        }

        // ==================== INITIALIZATION ====================
        fetchUserData();

        // Refresh token button
        const refreshTokenBtn = document.getElementById('refreshTokenBtn');
        if (refreshTokenBtn) {
            refreshTokenBtn.addEventListener('click', () => {
                redirectToLogin();
            });
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!userDropdownBtn.contains(event.target) && !userDropdownMenu.contains(event.target)) {
                userDropdownMenu.classList.add('hidden');
            }
        });
    });
</script></body>
</html>
