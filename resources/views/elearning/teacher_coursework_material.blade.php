<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LMS SATAS Material</title>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LMS SATAS Material</title>
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
            <button id="postMaterialBtn"
                class="bg-blue-800 text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-blue-900 focus:outline-none">
                Post
            </button>
        </div>

        <section class="flex flex-col border border-gray-300 rounded-lg overflow-hidden max-w-7xl mx-auto"
            style="min-height: 400px">
            <div class="flex-1 p-4 md:p-6 space-y-4 rounded-lg">
                <header class="flex items-center space-x-3 mb-2">
                    <button aria-label="Close" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                    <button aria-label="Material icon"
                        class="bg-gray-300 text-gray-600 rounded-full p-2 cursor-default" disabled>
                        <i class="fas fa-book text-sm"></i>
                    </button>
                    <h2 class="text-gray-600 font-semibold text-lg leading-6 select-none">Material</h2>
                </header>

                <form id="materialForm" class="space-y-4 bg-white rounded-lg border border-gray-300 p-4">
                    <input type="text" id="materialTitle" placeholder="Judul Materi" value="Watch this video 2"
                        class="w-full bg-white text-gray-800 text-sm font-normal leading-5 px-4 py-3 border-b border-gray-300 focus:outline-none focus:border-blue-500" />
                    <textarea id="materialLink" rows="4" placeholder="Link atau deskripsi materi"
                        class="w-full bg-white text-gray-800 text-xs font-normal leading-5 px-4 py-3 border-b border-gray-300 resize-none focus:outline-none focus:border-blue-500"></textarea>
                </form>
            </div>

            <input type="hidden" id="courseId" value="{{ $courseId }}">
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loginUrl = "{{ route('elearning.login') }}";
            const postBtn = document.getElementById('postMaterialBtn');

            if (postBtn) {
                postBtn.addEventListener('click', createMaterial);
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

        // ========== CREATE MATERIAL ==========
        async function createMaterial() {
            const token = localStorage.getItem('token');
            if (!token) {
                console.error('Token not found');
                alert('Silakan login kembali');
                redirectToLogin();
                return;
            }

            const courseId = document.getElementById('courseId').value;
            const title = document.getElementById('materialTitle').value;
            const link = document.getElementById('materialLink').value;

            // Input validation
            if (!title || !link) {
                alert('Judul dan link materi harus diisi');
                return;
            }

            try {
                const baseUrl = "{{ env('VITE_API_BASE_URL', 'http://127.0.0.1:8000/api') }}";
                const response = await axios.post(`${baseUrl}/classroom/courses/${courseId}/materials`, {
                    title: title,
                    description: link,
                }, {
                    headers: {
                        Authorization: `Bearer ${token}`,
                        'Content-Type': 'application/json'
                    }
                });

                alert("Materi berhasil dibuat!");
                window.location.href = `/elearning/teacher/coursework/${courseId}`;
            } catch (error) {
                console.error('Error creating material:', error);
                let errorMessage = "Gagal membuat materi";

                if (error.response) {
                    if (error.response.status === 401) {
                        errorMessage = "Sesi telah berakhir, silakan login kembali";
                        redirectToLogin();
                    } else if (error.response.data && error.response.data.message) {
                        errorMessage = error.response.data.message;
                    }
                }

                alert(errorMessage);
            }
        }
    </script>
</body>
</html>
