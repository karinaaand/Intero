@extends('layouts.app')

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
    <!-- Google Connection Status -->
    <div class="mb-6 p-4 border border-gray-200 rounded-lg">
        <div id="google-status" class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-medium text-gray-700">Checking Google connection...</h2>
            </div>
            <button id="connect-google" class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm hidden">
                Connect to Google
            </button>
            <button id="refresh-courses" class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm hidden">
                Refresh Courses
            </button>
        </div>
    </div>

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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const userNameElement = document.getElementById('user-name');
    const logoutBtn = document.getElementById('logout-btn');
    const googleStatusElement = document.getElementById('google-status');
    const connectGoogleBtn = document.getElementById('connect-google');
    const refreshCoursesBtn = document.getElementById('refresh-courses');
    const coursesContainer = document.getElementById('courses-container');
    const loadingCoursesElement = document.getElementById('loading-courses');
    const noCoursesElement = document.getElementById('no-courses');

    // Backend API URL
    const API_URL = 'http://localhost:8001/api';

    // Check if user is authenticated
    const token = localStorage.getItem('auth_token');
    if (!token) {
        window.location.href = '{{ route("elearning.login") }}';
        return;
    }

    // Set token in axios headers
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

    // Fetch user profile
    async function fetchUserProfile() {
        try {
            const userId = localStorage.getItem('user_id');
            const response = await axios.get(`${API_URL}/user-profiles/${userId}`);
            userNameElement.textContent = response.data.name || response.data.email;
        } catch (error) {
            console.error('Failed to fetch user profile:', error);
            userNameElement.textContent = 'User';
        }
    }

    // Check Google connection
    async function checkGoogleConnection() {
        try {
            const response = await axios.get(`${API_URL}/google/check-connection`);

            if (response.data.connected) {
                // Connected to Google
                googleStatusElement.innerHTML = `
                    <div>
                        <h2 class="text-lg font-medium text-green-700">Connected to Google Classroom</h2>
                        <p class="text-sm text-gray-500">Your account is linked to Google Classroom</p>
                    </div>
                `;
                connectGoogleBtn.classList.add('hidden');
                refreshCoursesBtn.classList.remove('hidden');

                // Fetch courses
                fetchCourses();
            } else {
                // Not connected to Google
                googleStatusElement.innerHTML = `
                    <div>
                        <h2 class="text-lg font-medium text-red-700">Not connected to Google Classroom</h2>
                        <p class="text-sm text-gray-500">Connect your account to access Google Classroom features</p>
                    </div>
                `;
                connectGoogleBtn.classList.remove('hidden');
                refreshCoursesBtn.classList.add('hidden');

                // Show no courses message
                loadingCoursesElement.classList.add('hidden');
                noCoursesElement.classList.remove('hidden');
            }
        } catch (error) {
            console.error('Failed to check Google connection:', error);
            googleStatusElement.innerHTML = `
                <div>
                    <h2 class="text-lg font-medium text-red-700">Error checking Google connection</h2>
                    <p class="text-sm text-gray-500">${error.response?.data?.message || 'Please try again later'}</p>
                </div>
            `;
            connectGoogleBtn.classList.remove('hidden');
            refreshCoursesBtn.classList.add('hidden');
        }
    }

    // Fetch courses
    async function fetchCourses() {
        try {
            loadingCoursesElement.classList.remove('hidden');
            noCoursesElement.classList.add('hidden');

            const response = await axios.get(`${API_URL}/google/courses`);
            const courses = response.data;

            if (courses.length > 0) {
                // Clear previous courses
                const courseElements = coursesContainer.querySelectorAll('.course-card');
                courseElements.forEach(el => el.remove());

                // Add new course cards
                courses.forEach(course => {
                    const courseCard = document.createElement('div');
                    courseCard.className = 'course-card bg-white rounded-lg shadow-md p-4';
                    courseCard.innerHTML = `
                        <h3 class="text-lg font-medium text-gray-700">${course.name}</h3>
                        <p class="text-gray-500">${course.description || 'No description available'}</p>
                        <div class="mt-4">
                            <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View details</a>
                        </div>
                    `;
                    coursesContainer.appendChild(courseCard);
                });

                loadingCoursesElement.classList.add('hidden');
            } else {
                loadingCoursesElement.classList.add('hidden');
                noCoursesElement.classList.remove('hidden');
            }
        } catch (error) {
            console.error('Failed to fetch courses:', error);
            loadingCoursesElement.classList.add('hidden');
            noCoursesElement.textContent = 'Failed to load courses. Please try again later.';
            noCoursesElement.classList.remove('hidden');
        }
    }

    // Event listeners
    logoutBtn.addEventListener('click', function() {
        localStorage.removeItem('auth_token');
        localStorage.removeItem('user_id');
        window.location.href = '{{ route("elearning.login") }}';
    });

    connectGoogleBtn.addEventListener('click', function() {
        window.location.href = '{{ route("elearning.connect") }}';
    });

    refreshCoursesBtn.addEventListener('click', fetchCourses);

    // Initial checks
    fetchUserProfile();
    checkGoogleConnection();
});
</script>
@endsection




