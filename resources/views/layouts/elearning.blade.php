@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gray-100"> <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center"> <span class="font-bold text-xl text-indigo-600">LMS
                                SATAS</span>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('home') }}"
                                class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Home
                            </a> <a href="{{ route('elearning.home') }}"
                                class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                E-Learning </a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <div id="user-name" class="text-sm font-medium text-gray-700 mr-4">Loading...</div>
                        <button id="logout-btn" type="button"
                            class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Logout</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg> </button>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Page Content -->
        <main class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @yield('elearning-content') </div>
        </main>
    </div>
@endsection
@section('scripts')
    <script>
        // Common elearning scripts    document.addEventListener('DOMContentLoaded', function() {
        const userNameElement = document.getElementById('user-name');
        const logoutBtn = document.getElementById('logout-btn');
        // Backend API URL
        const API_URL = 'http://localhost:8001/api';
        // Check if user is authenticated        const token = localStorage.getItem('auth_token');
        if (!token && !window.location.pathname.includes('/login') && !window.location.pathname.includes('/register')) {
            window.location.href = '{{ route('elearning.login') }}';
            return;
        }
        // Set token in axios headers if available
        if (token) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            // Fetch user profile
            const userId = localStorage.getItem('user_id');
            if (userId && userNameElement) {
                axios.get(`${API_URL}/user-profiles/${userId}`).then(response => {
                        userNameElement.textContent = response.data.name || response.data.email;
                    })
                    .catch(error => {
                        console.error('Failed to fetch user profile:', error);
                        userNameElement.textContent = 'User';
                    });
            }
        }
        // Logout functionality
        if (logoutBtn) {
            logoutBtn.addEventListener('click', function() {
                localStorage.removeItem('auth_token');
                localStorage.removeItem('user_id');
                window.location.href = '{{ route('elearning.login') }}';
            });
        }
        });
    </script>
    @yield('elearning-scripts')
@endsection
