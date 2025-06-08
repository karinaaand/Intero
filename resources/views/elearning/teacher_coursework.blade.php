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

        .coursework-item {
            transition: all 0.2s ease;
        }

        .coursework-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-white text-black w-full min-h-screen flex flex-col">
    <!-- Header section remains unchanged -->
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

    <div id="toast" class="toast"></div>

    <main class="max-w-7xl mx-auto p-6 flex-1 w-full">
        <section class="border border-gray-200 rounded-xl overflow-hidden min-h-full flex flex-col">
            <!-- Classroom header remains unchanged -->
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
                    <div aria-label="User initial" id="secondaryUserInitial"
                        class="w-8 h-8 rounded-full bg-purple-700 text-white flex items-center justify-center font-semibold text-sm">
                    </div>
                </div>
            </header>

            <div class="flex flex-1">
                <!-- Sidebar navigation remains unchanged -->
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
                    <div class="flex space-x-4 p-4 border-b border-gray-200" id="navTabs">
                        <!-- Navigation tabs will be added dynamically -->
                    </div>

                    <div class="p-6 flex-1">
                        <div class="flex justify-start mb-4 relative">
                            <button id="openModalBtn"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center">
                                <i class="fas fa-plus mr-2"></i> Create
                            </button>

                            <div id="modal"
                                class="hidden absolute top-full left-0 mt-2 w-40 rounded-md border border-gray-300 bg-white shadow-sm flex flex-col space-y-1 p-2 z-50">
                                <a id="assignmentLink"
                                class="flex items-center space-x-2 px-3 py-2 text-gray-500 hover:text-gray-700 focus:outline-none cursor-pointer">
                                    <i class="fas fa-external-link-alt text-lg"></i>
                                    <span class="text-sm font-normal">Assignment</span>
                                </a>

                                <a id="materialLink"
                                class="flex items-center space-x-2 px-3 py-2 text-gray-500 hover:text-gray-700 focus:outline-none cursor-pointer">
                                    <i class="fas fa-external-link-alt text-lg"></i>
                                    <span class="text-sm font-normal">Material</span>
                                </a>
                            </div>
                        </div>

                        <div id="courseworkList">
                            <!-- Coursework items will be loaded here -->
                        </div>

                        <div id="materialsList">
                            <!-- Materials will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            // ==================== COURSEWORK MODAL FUNCTIONALITY ====================
            const openModalBtn = document.getElementById('openModalBtn');
            const modal = document.getElementById('modal');
            const assignmentLink = document.getElementById('assignmentLink');
            const materialLink = document.getElementById('materialLink');
            const navTabs = document.getElementById('navTabs');

            // Get courseId from the URL
            const pathSegments = window.location.pathname.split('/');
            const courseId = pathSegments[pathSegments.length - 1];

            // Toggle modal visibility
            openModalBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                modal.classList.toggle('hidden');

                // Set the correct href for assignment and material links
                assignmentLink.setAttribute('href', `/elearning/teacher/coursework/${courseId}/assignment`);
                materialLink.setAttribute('href', `/elearning/teacher/coursework/${courseId}/material`);
            });

            // Navigation tabs setup
            const routes = [
                { name: 'Classwork', url: `/elearning/teacher/coursework/${courseId}`, active: true },
                { name: 'People', url: `/elearning/teacher/people/${courseId}`, active: false },
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

            // ==================== TEACHING/ENROLLED DROPDOWNS ====================
            const teachingBtn = document.getElementById('teaching-btn');
            const teachingDropdown = document.getElementById('teaching-dropdown');
            const teachingArrow = document.getElementById('teaching-arrow');

            const enrolledBtn = document.getElementById('enrolled-btn');
            const enrolledDropdown = document.getElementById('enrolled-dropdown');
            const enrolledArrow = document.getElementById('enrolled-arrow');

            if (teachingBtn && teachingDropdown) {
                teachingBtn.addEventListener('click', () => {
                    teachingDropdown.classList.toggle('hidden');
                    teachingArrow.classList.toggle('rotate-180');

                    // Close enrolled dropdown if open
                    if (enrolledDropdown && !enrolledDropdown.classList.contains('hidden')) {
                        enrolledDropdown.classList.add('hidden');
                        enrolledArrow.classList.remove('rotate-180');
                    }
                });
            }

            if (enrolledBtn && enrolledDropdown) {
                enrolledBtn.addEventListener('click', () => {
                    enrolledDropdown.classList.toggle('hidden');
                    enrolledArrow.classList.toggle('rotate-180');

                    // Close teaching dropdown if open
                    if (teachingDropdown && !teachingDropdown.classList.contains('hidden')) {
                        teachingDropdown.classList.add('hidden');
                        teachingArrow.classList.remove('rotate-180');
                    }
                });
            }

            // ==================== CLOSE DROPDOWNS WHEN CLICKING OUTSIDE ====================
            document.addEventListener('click', function(event) {
                // Close user dropdown
                if (!userDropdownBtn.contains(event.target) && !userDropdownMenu.contains(event.target)) {
                    userDropdownMenu.classList.add('hidden');
                }

                // Close coursework modal
                if (modal && !openModalBtn.contains(event.target) && !modal.contains(event.target)) {
                    modal.classList.add('hidden');
                }

                // Close teaching dropdown
                if (teachingBtn && !teachingBtn.contains(event.target) && teachingDropdown && !teachingDropdown.contains(event.target)) {
                    teachingDropdown.classList.add('hidden');
                    teachingArrow.classList.remove('rotate-180');
                }

                // Close enrolled dropdown
                if (enrolledBtn && !enrolledBtn.contains(event.target) && enrolledDropdown && !enrolledDropdown.contains(event.target)) {
                    enrolledDropdown.classList.add('hidden');
                    enrolledArrow.classList.remove('rotate-180');
                }
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

            // ==================== COURSEWORK FUNCTIONALITY ====================
            if (courseId) {
                loadCoursework(courseId);
                fetchMaterials(courseId);
            } else {
                const courseworkList = document.getElementById('courseworkList');
                if (courseworkList) {
                    courseworkList.innerHTML = '<div class="text-center py-8 text-gray-500">Pilih kelas untuk melihat coursework</div>';
                }
                const materialsList = document.getElementById('materialsList');
                if (materialsList) {
                    materialsList.innerHTML = '';
                }
            }

            // Format due date function
            function formatDueDate(dateObject) {
                if (!dateObject) {
                    return 'No due date';
                }

                if (typeof dateObject === 'string') {
                    const date = new Date(dateObject);
                    if (!isNaN(date)) {
                        return date.toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });
                    }
                    return dateObject;
                }

                if (dateObject.year && dateObject.month && dateObject.day) {
                    const date = new Date(dateObject.year, dateObject.month - 1, dateObject.day, dateObject.hour || 0, dateObject.minute || 0);
                    return date.toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });
                }

                return 'Invalid Date Format';
            }

            // Load coursework function
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
                    const courseworkList = document.getElementById('courseworkList');
                    if (courseworkList) {
                        courseworkList.innerHTML = '<div class="text-center py-8 text-red-500">Gagal memuat coursework</div>';
                    }

                    if (error.response?.status === 401) {
                        showToast('Session expired. Please login again.', false);
                        redirectToLogin();
                    } else {
                        showToast('Failed to load coursework. Please try again.', false);
                    }
                }
            }

            // Render coursework with clickable items
            function renderCoursework(courseworkItems) {
                const container = document.getElementById('courseworkList');
                if (!container) return;

                container.innerHTML = '';

                if (courseworkItems.length === 0) {
                    container.innerHTML = '<div class="text-center py-8 text-gray-500">Belum ada coursework</div>';
                    return;
                }

                courseworkItems.forEach(item => {
                    const formattedDueDate = formatDueDate(item.dueDate);
                    const itemElement = document.createElement('div');
                    itemElement.className = 'coursework-item mb-6 p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50';

                    // Create a link element for the coursework item
                    const linkElement = document.createElement('a');
                    linkElement.href = `/elearning/teacher/grades/${courseId}/${item.id}`;
                    linkElement.className = 'block';

                    linkElement.innerHTML = `
                        <h3 class="font-semibold text-lg mb-2">${item.title}</h3>
                        <p class="text-gray-600 mb-3">${item.description || 'Tidak ada deskripsi'}</p>
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Due: ${formattedDueDate}</span>
                            <span>Status: ${item.status || 'Not submitted'}</span>
                        </div>
                    `;

                    itemElement.appendChild(linkElement);
                    container.appendChild(itemElement);
                });
            }

            // ==================== MATERIALS FUNCTIONALITY ====================
            async function fetchMaterials(courseId) {
                try {
                    const token = getToken();
                    if (!token) {
                        showToast('Authentication token not found. Please login again.', false);
                        redirectToLogin();
                        return;
                    }

                    const baseUrl = "{{ env('VITE_API_BASE_URL', 'http://127.0.0.1:8000/api') }}";
                    const response = await axios.get(`${baseUrl}/classroom/courses/${courseId}/materials`, {
                        headers: {
                            Authorization: `Bearer ${token}`
                        }
                    });

                    const materials = response.data;
                    renderMaterials(materials);
                } catch (error) {
                    console.error('Gagal memuat materials:', error);
                    const materialsList = document.getElementById('materialsList');
                    if (materialsList) {
                        materialsList.innerHTML = '<div class="text-center py-8 text-red-500">Gagal memuat materials</div>';
                    }

                    if (error.response?.status === 401) {
                        showToast('Session expired. Please login again.', false);
                        redirectToLogin();
                    } else {
                        showToast('Failed to load materials. Please try again.', false);
                    }
                }
            }

            function renderMaterials(materialItems) {
    const container = document.getElementById('materialsList');
    if (!container) return;

    container.innerHTML = '';

    if (!Array.isArray(materialItems) || materialItems.length === 0) {
        container.innerHTML = '<div class="text-center py-8 text-gray-500">Belum ada materi</div>';
        return;
    }

    materialItems.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.className = 'material-item mb-6 p-4 border border-gray-200 rounded-lg';

        // Extract URL from description if it exists
        const urlPattern = /(https?:\/\/[^\s]+)/g;
        const description = item.description || '';
        const urls = description.match(urlPattern);
        const firstUrl = urls ? urls[0] : null;

        // Clean description by removing URLs (optional)
        const cleanDescription = description.replace(urlPattern, '').trim() || 'Tidak ada deskripsi';

        itemElement.innerHTML = `
            <h3 class="font-semibold text-lg mb-2">${item.title}</h3>
            <p class="text-gray-600 mb-3">${cleanDescription}</p>
            ${firstUrl ?
                `<a href="${firstUrl}" target="_blank" class="text-blue-600 hover:underline">Buka Materi</a>` :
                `<span class="text-gray-500">Tidak ada link materi</span>`
            }
        `;
        container.appendChild(itemElement);
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
        });
    </script>
</body>

</html>
