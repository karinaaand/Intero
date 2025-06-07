<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LMS SATAS Assignment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        /* Custom scrollbar for textarea */
        textarea::-webkit-scrollbar {
            width: 6px;
        }

        textarea::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 3px;
        }
    </style>
</head>

<body class="bg-white font-sans text-black">
    <header class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
        <div class="flex items-center space-x-8">
            <div class="font-sans font-semibold text-base leading-5">LMS SATAS</div>
            <nav class="flex space-x-6 text-sm font-normal leading-5 text-black">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <a href="{{ route('elearning.home') }}" class="relative text-blue-700 font-semibold hover:underline">
                    E-Learning
                    <span class="absolute bottom-0 left-0 right-0 h-[2px] bg-blue-700 rounded"></span>
                </a>
            </nav>
        </div>
        <div class="flex items-center space-x-8 text-sm font-normal leading-5">
            <span class="text-green-700">Token Refresh</span>
            <button id="userDropdown" class="text-blue-700 hover:underline flex items-center space-x-1">
                <span id="userName">Loading...</span>
                <i class="fas fa-chevron-down text-xs"></i>
            </button>
        </div>
    </header>

    <main class="p-6">
        <div class="flex justify-end mb-5">
            <button id="postAssignmentBtn"
                class="bg-blue-800 text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-blue-900 focus:outline-none">
                Assign
            </button>
        </div>

        <section class="flex flex-col md:flex-row border border-gray-300 rounded-lg overflow-hidden max-w-7xl mx-auto"
            style="min-height: 400px">
            <div
                class="flex-1 p-4 md:p-6 space-y-4 border-b md:border-b-0 md:border-r border-gray-300 rounded-t-lg md:rounded-t-none md:rounded-l-lg">
                <header class="flex items-center space-x-3 mb-2">
                    <button aria-label="Close" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                    <button aria-label="Assignment icon"
                        class="bg-gray-300 text-gray-600 rounded-full p-2 cursor-default" disabled>
                        <i class="fas fa-book text-sm"></i>
                    </button>
                    <h2 class="text-gray-600 font-semibold text-lg leading-6 select-none">Assignment</h2>
                </header>

                <form id="assignmentForm" class="space-y-4 bg-white rounded-lg border border-gray-300 p-4">
                    <input type="text" id="assignmentTitle" placeholder="Judul Materi"
                        class="w-full bg-white text-gray-800 text-sm font-normal leading-5 px-4 py-3 border-b border-gray-300 focus:outline-none focus:border-blue-500" />
                    <textarea id="assignmentLink" rows="4" placeholder="Link atau deskripsi materi"
                        class="w-full bg-white text-gray-800 text-xs font-normal leading-5 px-4 py-3 border-b border-gray-300 resize-none focus:outline-none focus:border-blue-500"></textarea>
                </form>
            </div>

            <aside class="w-full md:w-72 p-4 md:p-6 space-y-6 rounded-b-lg md:rounded-b-none md:rounded-r-lg">
                <div>
                    <label class="block text-xs font-semibold leading-4 mb-1">For</label>
                    <input type="text" id="assignmentFor" placeholder="Kelas tujuan" value="Kimia X MIPA 1"
                        class="w-full bg-white text-gray-800 text-xs font-normal leading-5 rounded-md px-4 py-3 border border-gray-300 focus:outline-none focus:border-blue-500" />
                </div>
                <div>
                    <label class="block text-xs font-semibold leading-4 mb-1">Points</label>
                    <input type="number" id="assignmentPoints" placeholder="Poin" value="100"
                        class="w-full bg-white text-gray-800 text-xs font-normal leading-5 rounded-md px-4 py-3 border border-gray-300 focus:outline-none focus:border-blue-500" />
                </div>
                <div>
                    <label class="block text-xs font-semibold leading-4 mb-1">Due Date</label>
                    <input type="date" id="assignmentDueDate"
                        class="w-full bg-white text-gray-800 text-xs font-normal leading-5 rounded-md px-4 py-3 border border-gray-300 focus:outline-none focus:border-blue-500" />
                </div>
            </aside>

            <input type="hidden" id="courseId" value="{{ $courseId }}">
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginUrl = "{{ route('elearning.login') }}";
            const postBtn = document.getElementById('postAssignmentBtn');

            if (postBtn) {
                postBtn.addEventListener('click', createAssignment);
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
                const token = localStorage.getItem('token');
                if (!token) {
                    console.error('Token not found');
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
                    updateUserDisplay(userData);
                } catch (error) {
                    console.error('Failed to fetch user data:', error);
                    if (error.response?.status === 401) {
                        redirectToLogin();
                    }
                }
            }

            // Update user display name
            function updateUserDisplay(userData) {
                const userNameElement = document.getElementById('userName');
                if (userData && userData.name) {
                    // Check if title exists in the data (like 'S.Pd.')
                    const title = userData.title ? `, ${userData.title}` : '';
                    userNameElement.textContent = `${userData.name}${title}`;
                } else {
                    userNameElement.textContent = 'User';
                }
            }

            // ==================== INITIALIZATION ====================
            fetchUserData();

            // Token refresh redirect to login
            const tokenRefreshText = document.querySelector('.text-green-700');
            if (tokenRefreshText) {
                tokenRefreshText.style.cursor = 'pointer';
                tokenRefreshText.title = 'Click to re-login';
                tokenRefreshText.addEventListener('click', () => {
                    redirectToLogin();
                });
            }

        });

        // ========== CREATE Assignment ==========
        async function createAssignment() {
            const token = localStorage.getItem('token');
            if (!token) {
                console.error('Token not found');
                alert('Silakan login kembali');
                redirectToLogin();
                return;
            }

            const courseId = document.getElementById('courseId').value;
            const title = document.getElementById('assignmentTitle').value;
            const description = document.getElementById('assignmentLink').value;
            const forClass = document.getElementById('assignmentFor').value;
            const points = document.getElementById('assignmentPoints').value;
            const dueDate = document.getElementById('assignmentDueDate').value;
            const [year, month, day] = dueDate.split('-').map(Number);

            // Idescriptionnput validation
            if (!title) {
                alert('Judul materi harus diisi');
                return;
            }

            try {
               const payload = {
                    title: title,
                    description: description, // Required
                    for: forClass,
                    points: points !== undefined ? parseInt(points) : 100,
                    due_year: year,
                    due_month: month,
                    due_day: day,
                    due_hour: 23,
                    due_minute: 59
                };
  console.log(dueDate);

                console.log("Sending payload:", payload);

                const response = await axios.post(`http://localhost:8000/api/courses/${courseId}/coursework`, payload, {
                    headers: {
                        Authorization: `Bearer ${token}`,
                        'Content-Type': 'application/json'
                    }
                });

                alert("Materi berhasil dibuat!");
                window.location.href = `/elearning/teacher/coursework/${courseId}`;
            } catch (error) {
                console.error('Error creating assignment:', error);
                let errorMessage = "Gagal membuat materi";

                if (error.response) {
                    if (error.response.status === 401) {
                        errorMessage = "Sesi telah berakhir, silakan login kembali";
                        redirectToLogin();
                    } else if (error.response.status === 404) {
                        errorMessage = "Course tidak ditemukan (404)";
                    } else if (error.response.data?.errors) {
                        console.error("Validation Errors:", error.response.data.errors);
                        const messages = Object.values(error.response.data.errors).flat().join("\n");
                        errorMessage = `Validasi gagal:\n${messages}`;
                    } else if (error.response.data?.message) {
                        errorMessage = error.response.data.message;
                    }
                }

                alert(errorMessage);
            }
        }
    </script>

</body>

</html>
