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

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.2s ease-out forwards;
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
                    <div aria-label="User initial G"
                        class="w-8 h-8 rounded-full bg-purple-700 text-white flex items-center justify-center font-semibold text-sm">
                        G</div>
                </div>
            </header>

            <div class="flex flex-1">
                <nav class="w-44 border-r border-gray-200 bg-blue-50 rounded-bl-xl">
                    <ul class="py-2">
                        <li>
                            <button
                                class="flex items-center w-full px-4 py-3 text-gray-900 text-sm font-normal hover:bg-blue-100">
                                <i class="fas fa-home text-gray-500 w-5 mr-3 text-center"></i>
                                <span>Home</span>
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
                    <div class="flex-1 flex flex-col">
                        <div class="flex space-x-4 p-4 border-b border-gray-200">
                            {{--  <a href="{{ route('elearning.teacher.stream') }}" class="px-6 py-2 rounded-full border border-gray-400 text-blue-900 text-sm font-normal">
                                Stream
                            </a>  --}}
                            {{--  <a href="{{ route('elearning.teacher.coursework') }}" class="px-6 py-2 rounded-full border border-gray-400 text-gray-900 text-sm font-normal">
                                Classwork
                            </a>
                            <a href="{{ route('elearning.teacher.people') }}" class="px-6 py-2 rounded-full border border-blue-400 bg-blue-300 text-gray-900 text-sm font-normal">
                                People
                            </a>
                            <a href="{{ route('elearning.teacher.grades') }}" class="px-6 py-2 rounded-full border border-gray-400 text-gray-900 text-sm font-normal">
                                Grades
                            </a>  --}}
                        </div>
                        <div class="flex-1 flex flex-col px-4">
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-sm font-normal">Teacher</p>
                                <button
                                    aria-label="Add teacher"
                                    class="text-gray-600 hover:text-gray-800"
                                    onclick="openTeacherModal()"
                                >
                                    <i class="fas fa-user-plus text-lg"></i>
                                </button>
                            </div>
                            <hr class="border border-gray-300 mb-6" />
                            <div class="flex items-center space-x-3 mb-10">
                                <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-600 text-sm"></i>
                                </div>
                                <p class="text-sm font-normal">Guy Hawkins, S.Pd</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-normal">Students</p>
                                <button
                                    aria-label="Add student"
                                    class="text-gray-600 hover:text-gray-800"
                                    onclick="openStudentModal()"
                                >
                                    <i class="fas fa-user-plus text-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Teacher Modal Backdrop -->
    <div
        id="teacher-modal-backdrop"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center"
    >
        <!-- Modal Content -->
        <div class="bg-white rounded-md shadow-md w-[320px] p-5 relative font-sans animate-fade-in">
            <!-- Close Button -->
            <button
                onclick="closeTeacherModal()"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
            >
                <i class="fas fa-times"></i>
            </button>

            <h2 class="text-gray-800 text-sm mb-3 font-medium">Invite Teacher</h2>
            <hr class="border-gray-300 mb-4" />

            <input
                type="text"
                id="teacher-input"
                placeholder="Type a name or email here"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 mb-4"
                oninput="validateTeacherInput()"
            />

            <div class="flex justify-between mt-4 pt-3 border-t border-gray-300 text-sm">
                <button
                    onclick="closeTeacherModal()"
                    class="text-blue-600 font-medium hover:text-blue-800 transition-colors"
                >
                    Cancel
                </button>
                <button
                    id="teacher-invite-button"
                    disabled
                    class="text-gray-400 font-medium cursor-not-allowed hover:text-gray-500 transition-colors"
                >
                    Invite as Teacher
                </button>
            </div>
        </div>
    </div>

    <!-- Student Modal Backdrop -->
    <div
        id="student-modal-backdrop"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center"
    >
        <!-- Modal Content -->
        <div class="bg-white rounded-md shadow-md w-[320px] p-5 relative font-sans animate-fade-in">
            <!-- Close Button -->
            <button
                onclick="closeStudentModal()"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
            >
                <i class="fas fa-times"></i>
            </button>

            <h2 class="text-gray-800 text-sm mb-3 font-medium">Invite Students</h2>
            <hr class="border-gray-300 mb-4" />

            <input
                type="text"
                id="student-input"
                placeholder="Type a name or email here"
                class="w-full border border-gray-300 rounded-md px-3 py-2 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 mb-4"
                oninput="validateStudentInput()"
            />

            <div class="flex justify-between mt-4 pt-3 border-t border-gray-300 text-sm">
                <button
                    onclick="closeStudentModal()"
                    class="text-blue-600 font-medium hover:text-blue-800 transition-colors"
                >
                    Cancel
                </button>
                <button
                    id="student-invite-button"
                    disabled
                    class="text-gray-400 font-medium cursor-not-allowed hover:text-gray-500 transition-colors"
                >
                    Invite Students
                </button>
            </div>
        </div>
    </div>

    <script>
        // Dropdown functionality
        const teachingBtn = document.getElementById('teaching-btn');
        const teachingDropdown = document.getElementById('teaching-dropdown');
        const teachingArrow = document.getElementById('teaching-arrow');

        teachingBtn.addEventListener('click', () => {
            const isHidden = teachingDropdown.classList.contains('hidden');

            if (isHidden) {
                teachingDropdown.classList.remove('hidden');
                teachingArrow.classList.add('rotate-180');
            } else {
                teachingDropdown.classList.add('hidden');
                teachingArrow.classList.remove('rotate-180');
            }
        });

        // Teacher Modal control functions
        function openTeacherModal() {
            document.getElementById('teacher-modal-backdrop').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            document.getElementById('teacher-input').focus();
        }

        function closeTeacherModal() {
            document.getElementById('teacher-modal-backdrop').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Teacher Input validation
        function validateTeacherInput() {
            const input = document.getElementById('teacher-input').value.trim();
            const inviteBtn = document.getElementById('teacher-invite-button');

            if (input.length > 0) {
                inviteBtn.disabled = false;
                inviteBtn.classList.remove('text-gray-400', 'cursor-not-allowed');
                inviteBtn.classList.add('text-blue-600', 'cursor-pointer', 'hover:text-blue-800');
            } else {
                inviteBtn.disabled = true;
                inviteBtn.classList.add('text-gray-400', 'cursor-not-allowed');
                inviteBtn.classList.remove('text-blue-600', 'cursor-pointer', 'hover:text-blue-800');
            }
        }

        // Student Modal control functions
        function openStudentModal() {
            document.getElementById('student-modal-backdrop').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            document.getElementById('student-input').focus();
        }

        function closeStudentModal() {
            document.getElementById('student-modal-backdrop').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Student Input validation
        function validateStudentInput() {
            const input = document.getElementById('student-input').value.trim();
            const inviteBtn = document.getElementById('student-invite-button');

            if (input.length > 0) {
                inviteBtn.disabled = false;
                inviteBtn.classList.remove('text-gray-400', 'cursor-not-allowed');
                inviteBtn.classList.add('text-blue-600', 'cursor-pointer', 'hover:text-blue-800');
            } else {
                inviteBtn.disabled = true;
                inviteBtn.classList.add('text-gray-400', 'cursor-not-allowed');
                inviteBtn.classList.remove('text-blue-600', 'cursor-pointer', 'hover:text-blue-800');
            }
        }

        // Close modals when clicking outside
        document.getElementById('teacher-modal-backdrop').addEventListener('click', function(e) {
            if (e.target === this) {
                closeTeacherModal();
            }
        });

        document.getElementById('student-modal-backdrop').addEventListener('click', function(e) {
            if (e.target === this) {
                closeStudentModal();
            }
        });

        // Close modals with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (!document.getElementById('teacher-modal-backdrop').classList.contains('hidden')) {
                    closeTeacherModal();
                }
                if (!document.getElementById('student-modal-backdrop').classList.contains('hidden')) {
                    closeStudentModal();
                }
            }
        });
    </script>
</body>
</html>
