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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.2s ease-in-out;
        }
    </style>
</head>

<body class="bg-white text-black w-full min-h-screen flex flex-col">
    <header class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
        <nav class="flex items-center space-x-8 text-sm font-semibold">
            <span>LMS SATAS</span>
            <a class="text-black" href="{{ route('home') }}">Home</a>
            <a class="text-blue-600 border-b-2 border-blue-600 pb-[6px]"
                href="{{ route('elearning.home') }}">E-Learning</a>
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
                        src="https://www.gstatic.com/classroom/logo_square_rounded.svg" class="UAJaRc"
                        alt="Google Classroom" data-iml="7900.70000000298" width="20">
                    <span>Google Classroom</span>
                </div>
                <div class="flex items-center space-x-4 text-gray-600 text-sm font-normal">
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
                    <div class="flex space-x-4 p-4 border-b border-gray-200" id="navTabs">
                        <!-- Tabs will be dynamically inserted here -->
                    </div>
                    <div class="flex-1 flex flex-col px-4 mt-8">
                        <div class="flex items-center justify-between mb-4">
                            <p class="text-sm font-normal">Teacher</p>
                        </div>
                        <hr class="border border-gray-300 mb-6" />
                        <div class="flex items-center space-x-3 mb-10" id="teacher-info">
                            <div id="teacher-avatar"
                                class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center">
                                <i class="fas fa-user text-gray-600 text-sm"></i>
                            </div>
                            <p id="teacher-name" class="text-sm font-normal">Loading teacher data...</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-normal">Students</p>
                            <button aria-label="Add student" class="text-gray-600 hover:text-gray-800"
                                id="addStudentBtn">
                                <i class="fas fa-user-plus text-lg"></i>
                            </button>
                        </div>
                        <div id="students-list" class="mt-4 space-y-3">
                            <!-- Students will be dynamically inserted here -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Student Modal Backdrop -->
    <div id="student-modal-backdrop"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <!-- Modal Content -->
        <div class="bg-white rounded-md shadow-md w-[320px] p-5 relative font-sans animate-fade-in">
            <!-- Close Button -->
            <button id="closeStudentModalBtn" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>

            <h2 class="text-gray-800 text-sm mb-3 font-medium">Invite Students</h2>
            <hr class="border-gray-300 mb-4" />

            <input type="text" id="student-input" placeholder="Type a name or email here"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 mb-4" />

            <div class="flex justify-between mt-4 pt-3 border-t border-gray-300 text-sm">
                <button id="cancelStudentModalBtn"
                    class="text-blue-600 font-medium hover:text-blue-800 transition-colors">
                    Cancel
                </button>
                <button id="student-invite-button" disabled
                    class="text-gray-400 font-medium cursor-not-allowed hover:text-gray-500 transition-colors">
                    Invite Students
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Global variables
        const pathSegments = window.location.pathname.split('/');
        const courseId = pathSegments[pathSegments.length - 1];

        // Toast functionality
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
            window.location.href = "{{ route('elearning.login') }}";
        }

        // Student modal functions
        function openStudentModal() {
            document.getElementById('student-modal-backdrop').classList.remove('hidden');
        }

        function closeStudentModal() {
            document.getElementById('student-modal-backdrop').classList.add('hidden');
            document.getElementById('student-input').value = '';
            document.getElementById('student-invite-button').disabled = true;
            document.getElementById('student-invite-button').classList.add('text-gray-400', 'cursor-not-allowed');
            document.getElementById('student-invite-button').classList.remove('text-blue-600', 'hover:text-blue-800');
        }

        function validateStudentInput() {
            const input = document.getElementById('student-input').value.trim();
            const inviteButton = document.getElementById('student-invite-button');

            if (input.length > 0) {
                inviteButton.disabled = false;
                inviteButton.classList.remove('text-gray-400', 'cursor-not-allowed');
                inviteButton.classList.add('text-blue-600', 'hover:text-blue-800');
            } else {
                inviteButton.disabled = true;
                inviteButton.classList.add('text-gray-400', 'cursor-not-allowed');
                inviteButton.classList.remove('text-blue-600', 'hover:text-blue-800');
            }
        }

        async function inviteStudents() {
            const email = document.getElementById('student-input').value;
            if (!email) {
                showToast('Please enter a valid email', false);
                return;
            }

            try {
                const baseUrl = "{{ env('VITE_API_BASE_URL', 'http://127.0.0.1:8000/api') }}";
                const response = await axios.post(`${baseUrl}/invitations`, {
                    course_id: courseId,
                    role: 'STUDENT',
                    user_id: email
                }, {
                    headers: {
                        'Authorization': `Bearer ${getToken()}`,
                        'Content-Type': 'application/json'
                    }
                });

                if (response.status === 200 || response.status === 201) {
                    showToast('Student invited successfully!');
                    closeStudentModal();
                    fetchStudents(courseId);
                } else {
                    showToast(response.data.message || 'Failed to invite student', false);
                }
            } catch (error) {
                console.error('Invitation error:', error);
                let errorMessage = 'Failed to invite student';

                if (error.response) {
                    if (error.response.status === 401) {
                        errorMessage = 'Session expired. Please login again';
                        redirectToLogin();
                    } else if (error.response.data?.message) {
                        errorMessage = error.response.data.message;
                    } else if (error.response.data?.error) {
                        errorMessage = error.response.data.error;
                    }
                }
                showToast(errorMessage, false);
            }
        }

        // User data fetching
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
            const userNameElement = document.getElementById('userName');
            const userInitialElement = document.getElementById('userInitial');
            const secondaryUserInitialElement = document.getElementById('secondaryUserInitial');

            if (!userNameElement || !userInitialElement || !secondaryUserInitialElement) return;

            // Generate initials from name or email
            let initials = '';
            if (userData.name) {
                userNameElement.textContent = userData.name;
                initials = userData.name.split(' ')
                    .map(part => part[0])
                    .join('')
                    .toUpperCase()
                    .substring(0, 2);
            } else if (userData.email) {
                userNameElement.textContent = userData.email;
                initials = userData.email[0].toUpperCase();
            }

            // Update user initials in header
            userInitialElement.textContent = initials;
            secondaryUserInitialElement.textContent = initials;

            // Update teacher information section
            const teacherAvatar = document.getElementById('teacher-avatar');
            const teacherName = document.getElementById('teacher-name');

            if (teacherAvatar && teacherName) {
                // Update teacher avatar
                teacherAvatar.innerHTML = '';
                teacherAvatar.style.backgroundColor = '#6b7280'; // gray color
                teacherAvatar.textContent = initials;

                // Update teacher name
                let displayName = userData.name || userData.email;
                if (userData.title) {
                    displayName += ', ' + userData.title;
                }
                teacherName.textContent = displayName;
            }
        }

        // Student data fetching
        async function fetchStudents(courseId) {
    try {
        const baseUrl = "{{ env('VITE_API_BASE_URL', 'http://127.0.0.1:8000/api') }}";
        const response = await axios.get(`${baseUrl}/students/${courseId}`, {
            headers: {
                'Authorization': `Bearer ${getToken()}`
            }
        });

        const studentsList = document.getElementById('students-list');
        studentsList.innerHTML = ''; // Clear existing content

        if (Array.isArray(response.data) && response.data.length > 0) {
            response.data.forEach(student => {
                const studentElement = document.createElement('div');
                studentElement.className = 'flex items-center space-x-3';

                const fullName = student?.profile?.name?.fullName || '';
                const email = student?.profile?.emailAddress || '';

                // Create avatar with initials
                const initials = fullName
                    ? fullName.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2)
                    : (email[0]?.toUpperCase() || '?');

                const avatarBgColor = getRandomColor();

                studentElement.innerHTML = `
                    <div class="w-8 h-8 rounded-full ${avatarBgColor} text-white flex items-center justify-center font-semibold text-sm">
                        ${initials}
                    </div>
                    <div>
                        <p class="text-sm font-normal">${fullName || email}</p>
                        ${email ? `<p class="text-xs text-gray-500">${email}</p>` : ''}
                    </div>
                `;

                studentsList.appendChild(studentElement);
            });
        } else {
            studentsList.innerHTML = '<p class="text-sm text-gray-500">No students found in this class</p>';
        }
    } catch (error) {
        console.error('Error fetching students:', error);
        document.getElementById('students-list').innerHTML = '<p class="text-sm text-red-500">Error loading students</p>';

        if (error.response && error.response.status === 401) {
            redirectToLogin();
        }
    }
}


        function getRandomColor() {
            const colors = [
                'bg-blue-600', 'bg-green-600', 'bg-purple-600',
                'bg-red-600', 'bg-yellow-600', 'bg-indigo-600',
                'bg-pink-600', 'bg-teal-600'
            ];
            return colors[Math.floor(Math.random() * colors.length)];
        }

        // Main initialization
        document.addEventListener('DOMContentLoaded', function() {
            // Extract courseId from URL
            const pathSegments = window.location.pathname.split('/');
            const courseId = pathSegments[pathSegments.length - 1];

            // Initialize navigation tabs
            const navTabs = document.getElementById('navTabs');
            const routes = [{
                    name: 'Classwork',
                    url: `/elearning/teacher/coursework/${courseId}`,
                    active: false
                },
                {
                    name: 'People',
                    url: `/elearning/teacher/people/${courseId}`,
                    active: true
                },
                {
                    name: 'Grades',
                    url: `/elearning/teacher/grades/${courseId}`,
                    active: false
                }
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

            // Initialize user dropdown
            const userDropdownBtn = document.getElementById('userDropdownBtn');
            const userDropdownMenu = document.createElement('div');
            userDropdownMenu.className =
                'hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 dropdown-menu';
            userDropdownMenu.innerHTML = `
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                <a href="{{ route('elearning.login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
            `;
            userDropdownBtn.parentNode.appendChild(userDropdownMenu);

            // Event listeners
            userDropdownBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                userDropdownMenu.classList.toggle('hidden');
            });

            document.getElementById('addStudentBtn').addEventListener('click', openStudentModal);
            document.getElementById('closeStudentModalBtn').addEventListener('click', closeStudentModal);
            document.getElementById('cancelStudentModalBtn').addEventListener('click', closeStudentModal);
            document.getElementById('student-input').addEventListener('input', validateStudentInput);
            document.getElementById('student-invite-button').addEventListener('click', inviteStudents);
            document.getElementById('refreshTokenBtn').addEventListener('click', redirectToLogin);

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                if (!userDropdownBtn.contains(event.target) && !userDropdownMenu.contains(event.target)) {
                    userDropdownMenu.classList.add('hidden');
                }
            });

            // Fetch initial data
            fetchUserData();
            fetchStudents(courseId);
        });
    </script>
</body>

</html>
