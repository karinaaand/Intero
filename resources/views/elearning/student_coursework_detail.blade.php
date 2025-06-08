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
    <!-- Header section remains unchanged -->
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

    <!-- Main Content -->
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
                                <a href="#"
                                    class="hover:underline">https://googlefiles.nl/tank/glazingbab/quality.salpages</a>
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
                        type="button" id="turninBtn">
                        <i class="fas fa-paper-plane"></i>
                        <span>Turn In</span>
                    </button>
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
            const loginUrl = "{{ route('elearning.login') }}";

            // Create user dropdown menu
            const userDropdownMenu = document.createElement('div');
            userDropdownMenu.className =
                'hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 dropdown-menu';
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

                // Close teaching dropdown
                if (teachingBtn && !teachingBtn.contains(event.target) && teachingDropdown && !
                    teachingDropdown.contains(event.target)) {
                    teachingDropdown.classList.add('hidden');
                    teachingArrow.classList.remove('rotate-180');
                }

                // Close enrolled dropdown
                if (enrolledBtn && !enrolledBtn.contains(event.target) && enrolledDropdown && !
                    enrolledDropdown.contains(event.target)) {
                    enrolledDropdown.classList.add('hidden');
                    enrolledArrow.classList.remove('rotate-180');
                }
            });

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
                if (!userNameElement || !userInitialElement) return;

                if (userData.name) {
                    userNameElement.textContent = userData.name;
                    const initials = userData.name.split(' ')
                        .map(part => part[0])
                        .join('')
                        .toUpperCase()
                        .substring(0, 2);

                    userInitialElement.textContent = initials;
                } else if (userData.email) {
                    userNameElement.textContent = userData.email;
                    const initial = userData.email[0].toUpperCase();
                    userInitialElement.textContent = initial;
                }
            }

            // ==================== TURN IN ASSIGNMENT FUNCTIONALITY ====================
            const turnInButton = document.getElementById('turninBtn');
            if (turnInButton) {
                turnInButton.addEventListener('click', async function() {
                    const inputLink = document.getElementById('input-link').value;
                    const token = getToken();

                    if (!token) {
                        alert('Please login to submit your work');
                        redirectToLogin();
                        return;
                    }

                    try {
                        // Use the specific URL for turning in assignments
                        const response = await axios.post(
                            'http://localhost:8000/api/courses/768621399520/coursework/768632815598/submissions/Cg4Ij6rAr68WEO7_17CvFg/turnin', {
                                link: inputLink
                            }, {
                                headers: {
                                    Authorization: `Bearer ${token}`,
                                    'Content-Type': 'application/json'
                                }
                            }
                        );

                        // Handle response according to backend format
                        if (response.data.message.includes('berhasil')) {
                            // Success case
                            alert(response.data.message);
                            // Update UI to show submission was successful
                            turnInButton.disabled = true;
                            turnInButton.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                            turnInButton.classList.add('bg-gray-400', 'cursor-not-allowed');
                            turnInButton.innerHTML =
                                '<i class="fas fa-check"></i><span>Submitted</span>';
                        } else {
                            // Other cases
                            alert(response.data.message || 'Assignment submission processed');
                        }
                    } catch (error) {
                        console.error('Failed to submit assignment:', error);
                        let errorMessage = 'Failed to submit assignment. Please try again.';

                        if (error.response) {
                            if (error.response.status === 401) {
                                errorMessage = 'Session expired. Please login again.';
                                redirectToLogin();
                            } else if (error.response.data && error.response.data.message) {
                                errorMessage = error.response.data.message;
                                if (error.response.data.error) {
                                    errorMessage += ` (${error.response.data.error})`;
                                }
                            }
                        }

                        alert(errorMessage);
                    }
                });
            }
            // ==================== INITIAL LOAD ====================
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
