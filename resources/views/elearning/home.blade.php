@extends('layouts.app')

@section('content')
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
                <span>Guy Hawkins, S.Pd</span>
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
                    <img alt="Google Classroom logo" class="w-5 h-5" height="20"
                        src="https://storage.googleapis.com/a1aa/image/462926ac-071c-432d-8541-e45b01ea601f.jpg"
                        width="20" />
                    <span>Google Classroom</span>
                </div>
                <div class="flex items-center space-x-4 text-gray-600 text-sm font-normal">
                    <button aria-label="Add" class="p-1 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-plus"></i>
                    </button>
                    <div aria-label="User initial A"
                        class="w-8 h-8 rounded-full bg-purple-700 text-white flex items-center justify-center font-semibold text-sm">
                        A</div>
                </div>
            </header>

            <div class="flex flex-1">
                <nav class="w-44 border-r border-gray-200 bg-blue-50 rounded-bl-xl">
                    <ul class="py-2">
                        <li>
                            <button
                                class="flex items-center w-full px-4 py-3 text-gray-900 text-sm font-normal hover:bg-blue-100 rounded-bl-xl bg-blue-100">
                                <i class="fas fa-home text-gray-500 w-5 mr-3 text-center"></i>
                                <span>Home</span>
                            </button>
                        </li>
                    </ul>
                </nav>

                <div class="flex-1 flex flex-col items-center justify-center p-8">
                    <img alt="Illustration" class="mb-4" height="120"
                        src="https://storage.googleapis.com/a1aa/image/ec98a4dc-11a1-4e95-095f-eaf434d338ed.jpg"
                        width="120" />
                    <p class="text-sm text-gray-700 mb-6">Tambahkan kelas untuk memulai</p>

                    <button id="openModalBtn"
                        class="bg-blue-600 text-white text-sm font-normal px-5 py-2 rounded-md hover:bg-blue-700 focus:outline-none">
                        Buat Kelas
                    </button>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="max-w-md w-full bg-white rounded-xl p-6 shadow-sm relative" role="dialog" aria-modal="true"
            aria-labelledby="modalTitle">
            <h2 id="modalTitle" class="text-gray-900 text-base font-normal mb-4">
                Create class
            </h2>

            <form id="classForm">
                <input id="className" type="text" placeholder="Class name (required)"
                    class="w-full mb-4 px-4 py-3 bg-gray-200 placeholder-gray-500 text-gray-700 text-sm rounded-none border-b border-gray-400 focus:outline-none focus:ring-0 focus:border-gray-600"
                    required />
                <input id="section" type="text" placeholder="Section"
                    class="w-full mb-6 px-4 py-3 bg-gray-200 placeholder-gray-500 text-gray-700 text-sm rounded-none border-b border-gray-400 focus:outline-none focus:ring-0 focus:border-gray-600" />
                <div class="flex justify-end space-x-6 text-sm font-normal">
                    <button type="button" id="cancelBtn"
                        class="text-blue-600 hover:underline focus:outline-none">
                        Cancel
                    </button>
                    <button id="createBtn" type="submit" disabled
                        class="text-gray-400 cursor-default">
                        Create
                    </button>
                </div>
            </form>

            <button id="closeModalBtn" aria-label="Close modal"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <script>
        const modal = document.getElementById('modal');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const classNameInput = document.getElementById('className');
        const sectionInput = document.getElementById('section');
        const createBtn = document.getElementById('createBtn');
        const classForm = document.getElementById('classForm');

        // Open modal
        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            classNameInput.value = '';
            sectionInput.value = '';
            createBtn.disabled = false;
            createBtn.classList.remove('text-gray-400', 'cursor-default');
            createBtn.classList.add('text-blue-600', 'hover:underline', 'cursor-pointer');
        });

        // Close modal
        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Close when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });

        // Form submission
        classForm.addEventListener('submit', (e) => {
            e.preventDefault();
            window.location.href = "{{ route('elearning.teacher.stream') }}";
        });

        // Enable create button when class name is filled
        classNameInput.addEventListener('input', () => {
            if (classNameInput.value.trim() !== '') {
                createBtn.disabled = false;
                createBtn.classList.remove('text-gray-400', 'cursor-default');
                createBtn.classList.add('text-blue-600', 'hover:underline', 'cursor-pointer');
            } else {
                createBtn.disabled = true;
                createBtn.classList.add('text-gray-400', 'cursor-default');
                createBtn.classList.remove('text-blue-600', 'hover:underline', 'cursor-pointer');
            }
        });
    </script>

<script>
    const baseUrl = "{{ env('VITE_API_BASE_URL') }}";

    function getToken() {
        return localStorage.getItem('token');
    }

    async function fetchCourses() {
        const token = getToken();

        if (!token) {
            console.error('Token not found');
            return;
        }

        try {
            const response = await axios.get(`${baseUrl}/courses`, {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            });

            const courses = response.data;

            // ✅ Tampilkan di console
            console.log('✅ Data courses berhasil didapatkan:', courses);

            // (Opsional) Tampilkan ke HTML
            const container = document.getElementById('course-list');
            container.innerHTML = '';
            courses.forEach(course => {
                const item = document.createElement('div');
                item.classList.add('course-item');
                item.innerText = `Course: ${course.name}`;
                container.appendChild(item);
            });

        } catch (error) {
            console.error('❌ Gagal mengambil data courses:', error.response?.data || error.message);
        }
    }

    document.addEventListener('DOMContentLoaded', fetchCourses);
</script>


</body>

</html>
@endsection

@section('scripts')
@endsection
