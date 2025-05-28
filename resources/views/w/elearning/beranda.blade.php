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

@endsection




