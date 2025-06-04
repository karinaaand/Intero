{{--  @extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <title>Google Classroom LMS</title>
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

            .course-card {
                border: 1px solid #e5e7eb;
                border-radius: 0.75rem;
                padding: 1rem;
                margin-bottom: 1rem;
                background-color: white;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                cursor: pointer;
                transition: transform 0.2s, box-shadow 0.2s;
            }

            .course-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.06);
            }

            .course-card h3 {
                font-size: 1.125rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .course-card p {
                font-size: 0.875rem;
                color: #4b5563;
                margin-bottom: 0.25rem;
            }

            .course-card .actions {
                margin-top: 1rem;
                display: flex;
                gap: 0.5rem;
            }

            .course-card .actions button {
                padding: 0.5rem 1rem;
                border-radius: 0.375rem;
                font-size: 0.875rem;
                font-weight: 500;
            }

            .btn-edit {
                background-color: #3b82f6;
                color: white;
            }

            .btn-edit:hover {
                background-color: #2563eb;
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
                <a class="text-blue-600 border-b-2 border-blue-600 pb-[6px]"  href="{{ route('elearning.home') }}">E-Learning</a>
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
                        <button id="openModalBtn" aria-label="Add" class="p-2 hover:bg-gray-100 rounded-full">
                            <i class="fas fa-plus text-lg"></i> <span class="ml-1">Buat Kelas</span>
                        </button>
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
                        </ul>
                    </nav>

                    <div class="flex-1 p-8">
                        <div id="emptyState" class="flex flex-col items-center justify-center text-center hidden">
                            <img alt="Illustration" class="mb-4" height="120"
                                src="https://storage.googleapis.com/a1aa/image/ec98a4dc-11a1-4e95-095f-eaf434d338ed.jpg"
                                width="120" />
                            <p class="text-sm text-gray-700 mb-6">Belum ada kelas. Tambahkan kelas untuk memulai.</p>
                            <button id="openModalBtnEmptyState"
                                class="bg-blue-600 text-white text-sm font-normal px-5 py-2 rounded-md hover:bg-blue-700 focus:outline-none">
                                Buat Kelas
                            </button>
                        </div>
                        <div id="coursesListContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        </div>
                        <p id="loadingMessage" class="text-center text-gray-500 mt-8">Loading courses...</p>
                    </div>
                </div>
            </section>
        </main>

        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="max-w-md w-full bg-white rounded-xl p-6 shadow-sm relative" role="dialog" aria-modal="true"
                aria-labelledby="modalTitle">
                <h2 id="modalTitle" class="text-gray-900 text-xl font-semibold mb-4">
                    Create class
                </h2>
                <form id="classForm">
                    <input type="hidden" id="courseId" name="courseId">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Class name
                            (required)</label>
                        <input id="name" name="name" type="text" placeholder="e.g. Matematika Dasar"
                            class="w-full px-4 py-3 bg-gray-100 placeholder-gray-500 text-gray-700 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label for="section" class="block text-sm font-medium text-gray-700 mb-1">Section</label>
                        <input id="section" name="section" type="text" placeholder="e.g. Kelas Pagi A"
                            class="w-full px-4 py-3 bg-gray-100 placeholder-gray-500 text-gray-700 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <input id="description" name="description" type="text" placeholder="Detail deskripsi kelas"
                            class="w-full px-4 py-3 bg-gray-100 placeholder-gray-500 text-gray-700 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="room" class="block text-sm font-medium text-gray-700 mb-1">Room</label>
                        <input id="room" name="room" type="text" placeholder="e.g. Ruang Teori 1"
                            class="w-full px-4 py-3 bg-gray-100 placeholder-gray-500 text-gray-700 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div class="flex justify-end space-x-4 text-sm font-normal">
                        <button type="button" id="cancelBtn"
                            class="px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-md focus:outline-none">
                            Cancel
                        </button>
                        <button type="submit" id="modalSubmitBtn"
                            class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded-md focus:outline-none">
                            Create
                        </button>
                    </div>
                </form>

                <button id="closeModalBtn" aria-label="Close modal"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const modal = document.getElementById('modal');
                const openModalBtn = document.getElementById('openModalBtn');
                const openModalBtnEmptyState = document.getElementById('openModalBtnEmptyState');
                const closeModalBtn = document.getElementById('closeModalBtn');
                const cancelBtn = document.getElementById('cancelBtn');
                const classForm = document.getElementById('classForm');
                const modalSubmitBtn = document.getElementById('modalSubmitBtn');
                const modalTitle = document.getElementById('modalTitle');
                const refreshTokenBtn = document.getElementById('refreshTokenBtn');
                const toast = document.getElementById('toast');
                const userDropdownBtn = document.getElementById('userDropdownBtn');

                // Form input fields
                const courseIdInput = document.getElementById('courseId');
                const nameInput = document.getElementById('name');
                const sectionInput = document.getElementById('section');
                const descriptionInput = document.getElementById('description');
                const roomInput = document.getElementById('room');

                // User elements
                const userNameElement = document.getElementById('userName');
                const userInitialElement = document.getElementById('userInitial');
                const secondaryUserInitialElement = document.getElementById('secondaryUserInitial');

                const coursesListContainer = document.getElementById('coursesListContainer');
                const emptyStateDiv = document.getElementById('emptyState');
                const loadingMessage = document.getElementById('loadingMessage');

                const baseUrl = "{{ env('VITE_API_BASE_URL', 'http://127.0.0.1:8000/api') }}";
                const loginUrl = "{{ route('elearning.login') }}";
                const streamBaseUrl = "{{ route('elearning.teacher.stream', '') }}";
                let currentEditingCourseId = null;
                let allCoursesData = [];

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

                function showToast(message, isSuccess = true) {
                    toast.textContent = message;
                    toast.style.backgroundColor = isSuccess ? '#4CAF50' : '#f44336';
                    toast.style.display = 'block';

                    setTimeout(() => {
                        toast.style.display = 'none';
                    }, 3000);
                }

                function getToken() {
                    return localStorage.getItem('token');
                }

                function setToken(token) {
                    localStorage.setItem('token', token);
                }

                function clearToken() {
                    localStorage.removeItem('token');
                }

                function showLoading(isLoading) {
                    if (isLoading) {
                        loadingMessage.classList.remove('hidden');
                        coursesListContainer.classList.add('hidden');
                        emptyStateDiv.classList.add('hidden');
                    } else {
                        loadingMessage.classList.add('hidden');
                    }
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

                function renderCourses(courses) {
                    coursesListContainer.innerHTML = '';
                    if (courses.length === 0) {
                        emptyStateDiv.classList.remove('hidden');
                        coursesListContainer.classList.add('hidden');
                    } else {
                        emptyStateDiv.classList.add('hidden');
                        coursesListContainer.classList.remove('hidden');
                        courses.forEach(course => {
                            const courseCard = `
                                <div class="course-card" data-id="${course.id}">
                                    <h3>${course.name}</h3>
                                    <p><strong>Section:</strong> ${course.section || 'N/A'}</p>
                                    <p><strong>Description:</strong> ${course.description || 'N/A'}</p>
                                    <p><strong>Room:</strong> ${course.room || 'N/A'}</p>
                                    <div class="actions">
                                        <button class="btn-edit" data-id="${course.id}">Edit</button>
                                    </div>
                                </div>
                            `;
                            coursesListContainer.insertAdjacentHTML('beforeend', courseCard);
                        });
                    }
                    attachActionListeners();
                    attachCardClickListeners();
                }

                function attachActionListeners() {
                    document.querySelectorAll('.btn-edit').forEach(button => {
                        button.addEventListener('click', handleEditClick);
                    });
                }

                function attachCardClickListeners() {
                    document.querySelectorAll('.course-card').forEach(card => {
                        card.addEventListener('click', (e) => {
                            // Prevent redirect if edit button is clicked
                            if (e.target.classList.contains('btn-edit') ||
                                e.target.closest('.btn-edit')) {
                                return;
                            }

                            const courseId = card.dataset.id;
                            window.location.href = `${streamBaseUrl}/${courseId}`;
                        });
                    });
                }

                function redirectToLogin() {
                    clearToken();
                    window.location.href = loginUrl;
                }

                async function fetchCourses() {
                    showLoading(true);
                    let token = getToken();

                    if (!token) {
                        console.error('Token not found');
                        showToast('Authentication token not found. Please login again.', false);
                        showLoading(false);
                        renderCourses([]);
                        redirectToLogin();
                        return;
                    }

                    try {
                        const response = await axios.get(`${baseUrl}/courses`, {
                            headers: {
                                Authorization: `Bearer ${token}`
                            }
                        });
                        allCoursesData = response.data;
                        console.log('✅ Data courses berhasil didapatkan:', allCoursesData);
                        renderCourses(allCoursesData);
                    } catch (error) {
                        console.error('❌ Gagal mengambil data courses:', error.response?.data || error.message);

                        if (error.response?.status === 401) {
                            showToast('Session expired. Please login again.', false);
                            redirectToLogin();
                        } else {
                            showToast('Failed to load courses. Please try again.', false);
                        }
                        renderCourses([]);
                    } finally {
                        showLoading(false);
                    }
                }

                function openModalForCreate() {
                    currentEditingCourseId = null;
                    modalTitle.textContent = 'Create Class';
                    modalSubmitBtn.textContent = 'Create';
                    classForm.reset();
                    courseIdInput.value = '';
                    updateSubmitButtonState();
                    modal.classList.remove('hidden');
                    nameInput.focus();
                }

                function openModalForEdit(courseId) {
                    const course = allCoursesData.find(c => c.id === courseId);
                    if (!course) {
                        console.error('Course not found for editing:', courseId);
                        showToast('Course data not found. Please refresh.', false);
                        return;
                    }

                    currentEditingCourseId = courseId;
                    modalTitle.textContent = 'Edit Class';
                    modalSubmitBtn.textContent = 'Save Changes';

                    courseIdInput.value = course.id;
                    nameInput.value = course.name || '';
                    sectionInput.value = course.section || '';
                    descriptionInput.value = course.description || '';
                    roomInput.value = course.room || '';

                    updateSubmitButtonState();
                    modal.classList.remove('hidden');
                    nameInput.focus();
                }

                function closeModal() {
                    modal.classList.add('hidden');
                    classForm.reset();
                    currentEditingCourseId = null;
                }

                function updateSubmitButtonState() {
                    if (nameInput.value.trim() !== '') {
                        modalSubmitBtn.disabled = false;
                        modalSubmitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                        modalSubmitBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
                    } else {
                        modalSubmitBtn.disabled = true;
                        modalSubmitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                        modalSubmitBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                    }
                }

                // Event Listeners
                openModalBtn.addEventListener('click', openModalForCreate);
                if (openModalBtnEmptyState) {
                    openModalBtnEmptyState.addEventListener('click', openModalForCreate);
                }
                closeModalBtn.addEventListener('click', closeModal);
                cancelBtn.addEventListener('click', closeModal);
                window.addEventListener('click', (e) => {
                    if (e.target === modal) closeModal();
                });

                refreshTokenBtn.addEventListener('click', () => {
                    redirectToLogin();
                });

                nameInput.addEventListener('input', updateSubmitButtonState);

                classForm.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    if (nameInput.value.trim() === '') {
                        showToast('Class name is required.', false);
                        nameInput.focus();
                        return;
                    }

                    let token = getToken();
                    if (!token) {
                        showToast('Authentication token not found. Please login again.', false);
                        redirectToLogin();
                        return;
                    }

                    const courseData = {
                        name: nameInput.value.trim(),
                        section: sectionInput.value.trim(),
                        description: descriptionInput.value.trim(),
                        room: roomInput.value.trim(),
                    };

                    modalSubmitBtn.disabled = true;
                    modalSubmitBtn.textContent = currentEditingCourseId ? 'Saving...' : 'Creating...';

                    try {
                        let response;
                        if (currentEditingCourseId) {
                            response = await axios.put(`${baseUrl}/courses/${currentEditingCourseId}`, courseData, {
                                headers: {
                                    Authorization: `Bearer ${token}`
                                }
                            });
                            showToast('Class updated successfully!');
                            closeModal();
                            fetchCourses();
                        } else {
                            response = await axios.post(`${baseUrl}/courses`, courseData, {
                                headers: {
                                    Authorization: `Bearer ${token}`
                                }
                            });

                            showToast('Class created successfully!');

                            const existingFallback = document.querySelector('.classroom-fallback');
                            if (existingFallback) {
                                existingFallback.remove();
                            }

                            if (response.data?.alternateLink) {
                                const shouldRedirect = confirm('Class created successfully! Do you want to open Google Classroom now?');

                                if (shouldRedirect) {
                                    const newWindow = window.open(response.data.alternateLink, '_blank', 'noopener,noreferrer');

                                    if (!newWindow || newWindow.closed || typeof newWindow.closed === 'undefined') {
                                        showFallbackLink(response.data.alternateLink);
                                    }
                                } else {
                                    showFallbackLink(response.data.alternateLink, true);
                                }
                            } else {
                                showToast('Class created but no Google Classroom link available', false);
                            }

                            closeModal();
                            fetchCourses();
                        }
                    } catch (error) {
                        console.error('Error saving course:', error.response?.data || error.message);
                        const errorMessage = error.response?.data?.message || 'Failed to save course. Please try again.';
                        showToast(errorMessage, false);
                    } finally {
                        modalSubmitBtn.disabled = false;
                        modalSubmitBtn.textContent = currentEditingCourseId ? 'Save Changes' : 'Create';
                        updateSubmitButtonState();
                    }
                });

                function showFallbackLink(alternateLink, inModal = false) {
                    const fallbackHTML = `
                        <div class="classroom-fallback mt-4 p-3 bg-blue-50 rounded-md">
                            <p class="text-sm text-gray-700 mb-2">You can access your class at:</p>
                            <a href="${alternateLink}" target="_blank"
                               class="text-blue-600 underline text-sm font-medium">
                               Open Google Classroom
                            </a>
                            <p class="text-xs text-gray-500 mt-1">Link will open in a new tab</p>
                        </div>
                    `;

                    if (inModal) {
                        const formContainer = document.querySelector('.max-w-md.w-full.bg-white.rounded-xl');
                        if (formContainer) {
                            formContainer.insertAdjacentHTML('beforeend', fallbackHTML);
                        }
                    } else {
                        const mainContent = document.querySelector('main');
                        if (mainContent) {
                            mainContent.insertAdjacentHTML('afterbegin', fallbackHTML);
                        }
                    }
                }

                function handleEditClick(event) {
                    event.stopPropagation();
                    const courseId = event.currentTarget.dataset.id;
                    openModalForEdit(courseId);
                }

                // Initial load
                updateSubmitButtonState();
                fetchUserData(); // Fetch user data first
                fetchCourses(); // Then fetch courses
            });
        </script>
    </body>

    </html>
@endsection

@section('scripts')
@endsection
  --}}
@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <title>Google Classroom LMS</title>
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

            .course-card {
                border: 1px solid #e5e7eb;
                border-radius: 0.75rem;
                padding: 1rem;
                margin-bottom: 1rem;
                background-color: white;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                cursor: pointer;
                transition: transform 0.2s, box-shadow 0.2s;
            }

            .course-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.06);
            }

            .course-card h3 {
                font-size: 1.125rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .course-card p {
                font-size: 0.875rem;
                color: #4b5563;
                margin-bottom: 0.25rem;
            }

            .course-card .actions {
                margin-top: 1rem;
                display: flex;
                gap: 0.5rem;
            }

            .course-card .actions button {
                padding: 0.5rem 1rem;
                border-radius: 0.375rem;
                font-size: 0.875rem;
                font-weight: 500;
            }

            .btn-edit {
                background-color: #3b82f6;
                color: white;
            }

            .btn-edit:hover {
                background-color: #2563eb;
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
                <a class="text-blue-600 border-b-2 border-blue-600 pb-[6px]"  href="{{ route('elearning.home') }}">E-Learning</a>
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
                        <button id="openModalBtn" aria-label="Add" class="p-2 hover:bg-gray-100 rounded-full">
                            <i class="fas fa-plus text-lg"></i> <span class="ml-1">Buat Kelas</span>
                        </button>
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
                        </ul>
                    </nav>

                    <div class="flex-1 p-8">
                        <div id="emptyState" class="flex flex-col items-center justify-center text-center hidden">
                            <img alt="Illustration" class="mb-4" height="120"
                                src="https://storage.googleapis.com/a1aa/image/ec98a4dc-11a1-4e95-095f-eaf434d338ed.jpg"
                                width="120" />
                            <p class="text-sm text-gray-700 mb-6">Belum ada kelas. Tambahkan kelas untuk memulai.</p>
                            <button id="openModalBtnEmptyState"
                                class="bg-blue-600 text-white text-sm font-normal px-5 py-2 rounded-md hover:bg-blue-700 focus:outline-none">
                                Buat Kelas
                            </button>
                        </div>
                        <div id="coursesListContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        </div>
                        <p id="loadingMessage" class="text-center text-gray-500 mt-8">Loading courses...</p>
                    </div>
                </div>
            </section>
        </main>

        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="max-w-md w-full bg-white rounded-xl p-6 shadow-sm relative" role="dialog" aria-modal="true"
                aria-labelledby="modalTitle">
                <h2 id="modalTitle" class="text-gray-900 text-xl font-semibold mb-4">
                    Create class
                </h2>
                <form id="classForm">
                    <input type="hidden" id="courseId" name="courseId">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Class name
                            (required)</label>
                        <input id="name" name="name" type="text" placeholder="e.g. Matematika Dasar"
                            class="w-full px-4 py-3 bg-gray-100 placeholder-gray-500 text-gray-700 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label for="section" class="block text-sm font-medium text-gray-700 mb-1">Section</label>
                        <input id="section" name="section" type="text" placeholder="e.g. Kelas Pagi A"
                            class="w-full px-4 py-3 bg-gray-100 placeholder-gray-500 text-gray-700 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <input id="description" name="description" type="text" placeholder="Detail deskripsi kelas"
                            class="w-full px-4 py-3 bg-gray-100 placeholder-gray-500 text-gray-700 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div class="mb-6">
                        <label for="room" class="block text-sm font-medium text-gray-700 mb-1">Room</label>
                        <input id="room" name="room" type="text" placeholder="e.g. Ruang Teori 1"
                            class="w-full px-4 py-3 bg-gray-100 placeholder-gray-500 text-gray-700 text-sm rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div class="flex justify-end space-x-4 text-sm font-normal">
                        <button type="button" id="cancelBtn"
                            class="px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-md focus:outline-none">
                            Cancel
                        </button>
                        <button type="submit" id="modalSubmitBtn"
                            class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded-md focus:outline-none">
                            Create
                        </button>
                    </div>
                </form>

                <button id="closeModalBtn" aria-label="Close modal"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const modal = document.getElementById('modal');
                const openModalBtn = document.getElementById('openModalBtn');
                const openModalBtnEmptyState = document.getElementById('openModalBtnEmptyState');
                const closeModalBtn = document.getElementById('closeModalBtn');
                const cancelBtn = document.getElementById('cancelBtn');
                const classForm = document.getElementById('classForm');
                const modalSubmitBtn = document.getElementById('modalSubmitBtn');
                const modalTitle = document.getElementById('modalTitle');
                const refreshTokenBtn = document.getElementById('refreshTokenBtn');
                const toast = document.getElementById('toast');
                const userDropdownBtn = document.getElementById('userDropdownBtn');

                // Form input fields
                const courseIdInput = document.getElementById('courseId');
                const nameInput = document.getElementById('name');
                const sectionInput = document.getElementById('section');
                const descriptionInput = document.getElementById('description');
                const roomInput = document.getElementById('room');

                // User elements
                const userNameElement = document.getElementById('userName');
                const userInitialElement = document.getElementById('userInitial');
                const secondaryUserInitialElement = document.getElementById('secondaryUserInitial');

                const coursesListContainer = document.getElementById('coursesListContainer');
                const emptyStateDiv = document.getElementById('emptyState');
                const loadingMessage = document.getElementById('loadingMessage');

                const baseUrl = "{{ env('VITE_API_BASE_URL', 'http://127.0.0.1:8000/api') }}";
                const loginUrl = "{{ route('elearning.login') }}";
                const streamBaseUrl = "{{ route('elearning.teacher.coursework', '') }}";
                const apiCoursesBaseUrl = "http://localhost:8000/api/courses";
                let currentEditingCourseId = null;
                let allCoursesData = [];

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

                function showToast(message, isSuccess = true) {
                    toast.textContent = message;
                    toast.style.backgroundColor = isSuccess ? '#4CAF50' : '#f44336';
                    toast.style.display = 'block';

                    setTimeout(() => {
                        toast.style.display = 'none';
                    }, 3000);
                }

                function getToken() {
                    return localStorage.getItem('token');
                }

                function setToken(token) {
                    localStorage.setItem('token', token);
                }

                function clearToken() {
                    localStorage.removeItem('token');
                }

                function showLoading(isLoading) {
                    if (isLoading) {
                        loadingMessage.classList.remove('hidden');
                        coursesListContainer.classList.add('hidden');
                        emptyStateDiv.classList.add('hidden');
                    } else {
                        loadingMessage.classList.add('hidden');
                    }
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

                function renderCourses(courses) {
                    coursesListContainer.innerHTML = '';
                    if (courses.length === 0) {
                        emptyStateDiv.classList.remove('hidden');
                        coursesListContainer.classList.add('hidden');
                    } else {
                        emptyStateDiv.classList.add('hidden');
                        coursesListContainer.classList.remove('hidden');
                        courses.forEach(course => {
                            const courseCard = `
                                <div class="course-card" data-id="${course.id}">
                                    <h3>${course.name}</h3>
                                    <p><strong>Section:</strong> ${course.section || 'N/A'}</p>
                                    <p><strong>Description:</strong> ${course.description || 'N/A'}</p>
                                    <p><strong>Room:</strong> ${course.room || 'N/A'}</p>
                                    <div class="actions">
                                        <button class="btn-edit" data-id="${course.id}">Edit</button>
                                    </div>
                                </div>
                            `;
                            coursesListContainer.insertAdjacentHTML('beforeend', courseCard);
                        });
                    }
                    attachActionListeners();
                    attachCardClickListeners();
                }

                function attachActionListeners() {
                    document.querySelectorAll('.btn-edit').forEach(button => {
                        button.addEventListener('click', handleEditClick);
                    });
                }

                function attachCardClickListeners() {
                    document.querySelectorAll('.course-card').forEach(card => {
                        card.addEventListener('click', (e) => {
                            // Prevent redirect if edit button is clicked
                            if (e.target.classList.contains('btn-edit') ||
                                e.target.closest('.btn-edit')) {
                                return;
                            }

                            const courseId = card.dataset.id;
                            // Redirect ke halaman stream teacher dengan courseId
                            window.location.href = `${streamBaseUrl}/${courseId}`;
                        });
                    });
                }

                function redirectToLogin() {
                    clearToken();
                    window.location.href = loginUrl;
                }

                async function fetchCourses() {
                    showLoading(true);
                    let token = getToken();

                    if (!token) {
                        console.error('Token not found');
                        showToast('Authentication token not found. Please login again.', false);
                        showLoading(false);
                        renderCourses([]);
                        redirectToLogin();
                        return;
                    }

                    try {
                        const response = await axios.get(`${apiCoursesBaseUrl}`, {
                            headers: {
                                Authorization: `Bearer ${token}`
                            }
                        });
                        allCoursesData = response.data;
                        console.log('✅ Data courses berhasil didapatkan:', allCoursesData);
                        renderCourses(allCoursesData);
                    } catch (error) {
                        console.error('❌ Gagal mengambil data courses:', error.response?.data || error.message);

                        if (error.response?.status === 401) {
                            showToast('Session expired. Please login again.', false);
                            redirectToLogin();
                        } else {
                            showToast('Failed to load courses. Please try again.', false);
                        }
                        renderCourses([]);
                    } finally {
                        showLoading(false);
                    }
                }

                function openModalForCreate() {
                    currentEditingCourseId = null;
                    modalTitle.textContent = 'Create Class';
                    modalSubmitBtn.textContent = 'Create';
                    classForm.reset();
                    courseIdInput.value = '';
                    updateSubmitButtonState();
                    modal.classList.remove('hidden');
                    nameInput.focus();
                }

                function openModalForEdit(courseId) {
                    const course = allCoursesData.find(c => c.id === courseId);
                    if (!course) {
                        console.error('Course not found for editing:', courseId);
                        showToast('Course data not found. Please refresh.', false);
                        return;
                    }

                    currentEditingCourseId = courseId;
                    modalTitle.textContent = 'Edit Class';
                    modalSubmitBtn.textContent = 'Save Changes';

                    courseIdInput.value = course.id;
                    nameInput.value = course.name || '';
                    sectionInput.value = course.section || '';
                    descriptionInput.value = course.description || '';
                    roomInput.value = course.room || '';

                    updateSubmitButtonState();
                    modal.classList.remove('hidden');
                    nameInput.focus();
                }

                function closeModal() {
                    modal.classList.add('hidden');
                    classForm.reset();
                    currentEditingCourseId = null;
                }

                function updateSubmitButtonState() {
                    if (nameInput.value.trim() !== '') {
                        modalSubmitBtn.disabled = false;
                        modalSubmitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                        modalSubmitBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
                    } else {
                        modalSubmitBtn.disabled = true;
                        modalSubmitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                        modalSubmitBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                    }
                }

                // Event Listeners
                openModalBtn.addEventListener('click', openModalForCreate);
                if (openModalBtnEmptyState) {
                    openModalBtnEmptyState.addEventListener('click', openModalForCreate);
                }
                closeModalBtn.addEventListener('click', closeModal);
                cancelBtn.addEventListener('click', closeModal);
                window.addEventListener('click', (e) => {
                    if (e.target === modal) closeModal();
                });

                refreshTokenBtn.addEventListener('click', () => {
                    redirectToLogin();
                });

                nameInput.addEventListener('input', updateSubmitButtonState);

                classForm.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    if (nameInput.value.trim() === '') {
                        showToast('Class name is required.', false);
                        nameInput.focus();
                        return;
                    }

                    let token = getToken();
                    if (!token) {
                        showToast('Authentication token not found. Please login again.', false);
                        redirectToLogin();
                        return;
                    }

                    const courseData = {
                        name: nameInput.value.trim(),
                        section: sectionInput.value.trim(),
                        description: descriptionInput.value.trim(),
                        room: roomInput.value.trim(),
                    };

                    modalSubmitBtn.disabled = true;
                    modalSubmitBtn.textContent = currentEditingCourseId ? 'Saving...' : 'Creating...';

                    try {
                        let response;
                        if (currentEditingCourseId) {
                            response = await axios.put(`${apiCoursesBaseUrl}/${currentEditingCourseId}`, courseData, {
                                headers: {
                                    Authorization: `Bearer ${token}`
                                }
                            });
                            showToast('Class updated successfully!');
                            closeModal();
                            fetchCourses();
                        } else {
                            response = await axios.post(`${apiCoursesBaseUrl}`, courseData, {
                                headers: {
                                    Authorization: `Bearer ${token}`
                                }
                            });

                            showToast('Class created successfully!');

                            const existingFallback = document.querySelector('.classroom-fallback');
                            if (existingFallback) {
                                existingFallback.remove();
                            }

                            if (response.data?.alternateLink) {
                                const shouldRedirect = confirm('Class created successfully! Do you want to open Google Classroom now?');

                                if (shouldRedirect) {
                                    const newWindow = window.open(response.data.alternateLink, '_blank', 'noopener,noreferrer');

                                    if (!newWindow || newWindow.closed || typeof newWindow.closed === 'undefined') {
                                        showFallbackLink(response.data.alternateLink);
                                    }
                                } else {
                                    showFallbackLink(response.data.alternateLink, true);
                                }
                            } else {
                                showToast('Class created but no Google Classroom link available', false);
                            }

                            closeModal();
                            fetchCourses();
                        }
                    } catch (error) {
                        console.error('Error saving course:', error.response?.data || error.message);
                        const errorMessage = error.response?.data?.message || 'Failed to save course. Please try again.';
                        showToast(errorMessage, false);
                    } finally {
                        modalSubmitBtn.disabled = false;
                        modalSubmitBtn.textContent = currentEditingCourseId ? 'Save Changes' : 'Create';
                        updateSubmitButtonState();
                    }
                });

                function showFallbackLink(alternateLink, inModal = false) {
                    const fallbackHTML = `
                        <div class="classroom-fallback mt-4 p-3 bg-blue-50 rounded-md">
                            <p class="text-sm text-gray-700 mb-2">You can access your class at:</p>
                            <a href="${alternateLink}" target="_blank"
                               class="text-blue-600 underline text-sm font-medium">
                               Open Google Classroom
                            </a>
                            <p class="text-xs text-gray-500 mt-1">Link will open in a new tab</p>
                        </div>
                    `;

                    if (inModal) {
                        const formContainer = document.querySelector('.max-w-md.w-full.bg-white.rounded-xl');
                        if (formContainer) {
                            formContainer.insertAdjacentHTML('beforeend', fallbackHTML);
                        }
                    } else {
                        const mainContent = document.querySelector('main');
                        if (mainContent) {
                            mainContent.insertAdjacentHTML('afterbegin', fallbackHTML);
                        }
                    }
                }

                function handleEditClick(event) {
                    event.stopPropagation();
                    const courseId = event.currentTarget.dataset.id;
                    openModalForEdit(courseId);
                }

                // Initial load
                updateSubmitButtonState();
                fetchUserData(); // Fetch user data first
                fetchCourses(); // Then fetch courses
            });
        </script>
    </body>

    </html>
@endsection

@section('scripts')
@endsection
