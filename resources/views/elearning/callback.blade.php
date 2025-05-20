<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Authentication</title>    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-gray-100">    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg">            <h1 class="text-2xl font-bold mb-6">Google Authentication</h1>
            <button id="google-auth-btn" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">                Sign in with Google
            </button>        </div>
    </div>    <script>
        document.getElementById('google-auth-btn').addEventListener('click', function() {            window.location.href = '/auth/google';
        });    </script>
</body>
</html>













