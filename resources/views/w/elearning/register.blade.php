<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register LMS SATAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="bg-white flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full">
        <h2 class="text-center font-bold text-xl mb-6">Sign Up to LMS SATAS</h2>

        <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 hidden">
        </div>
        <div id="success-message"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 hidden"></div>

        <form id="register-form" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                    Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign Up
                </button>
            </div>
            <hr class="border-t border-gray-300" />
            <div class="text-center mt-4">
                <a href="{{ route('elearning.login') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Already have an account? Log in</a>
            </div>
        </form>
    </div>

    <script>
        const baseUrl = "http://127.0.0.1:8000/api";

    document.getElementById('register-form').addEventListener('submit', async function(e) {
      e.preventDefault();
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const password_confirmation = document.getElementById('password_confirmation').value;

      try {
        // Kirim request register
        const response = await axios.post(`${baseUrl}/auth/register`, {
          name, email, password, password_confirmation
        });

        // Tampilkan pesan sukses
        document.getElementById('success-message').classList.remove('hidden');
        document.getElementById('success-message').innerText = "Registration successful!";

        // Simpan user dan token ke localStorage
        const user = response.data.user;
        const token = response.data.token;
        localStorage.setItem('user', JSON.stringify(user));
        localStorage.setItem('token', token);

        // Lakukan GET ke /google/initiate dengan token di header Authorization
        const initiateResponse = await axios.get(`${baseUrl}/google/initiate`, {
          headers: {
            Authorization: `Bearer ${token}`
          }
        });

        const googleAuthUrl = initiateResponse.data.google_auth_url;

        // Buka popup baru dengan google_auth_url
        window.open(googleAuthUrl, '_blank', 'width=600,height=600');

      } catch (error) {
        console.error(error);
        const message = error.response?.data?.message || 'Registration failed';
        document.getElementById('error-message').classList.remove('hidden');
        document.getElementById('error-message').innerText = message;
      }
    });
    </script>
</body>

</html>
