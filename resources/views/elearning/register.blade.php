<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Register LMS SATAS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-white flex items-center justify-center min-h-screen">

  <div class="max-w-md w-full">
    <h2 class="text-center font-bold text-xl mb-6">Sign Up to LMS SATAS</h2>
    
    <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 hidden"></div>
    
    <form id="register-form" class="space-y-4">
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" id="name" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
      </div>
      
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
      </div>
      
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
      </div>
      
      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
      </div>
      
      <div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Sign Up
        </button>
      </div>

      <!-- Divider -->
      <hr class="border-t border-gray-300"/>

      <!-- Google Login -->
      <button id="google-register" type="button" class="w-full flex items-center rounded-md overflow-hidden shadow-[0_4px_0_rgba(0,0,0,0.2)]">
        <div class="bg-white px-4 py-2 flex items-center justify-center border border-blue-600">
          <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google G logo" class="w-5 h-5"/>
        </div>
        <span class="text-white bg-blue-600 px-4 py-2 text-sm font-normal flex-1 text-center">
          Connect with your Google Account
        </span>
      </button>
      
      <div class="text-center mt-4">
        <a href="{{ route('elearning.login') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
          Already have an account? Log in
        </a>
      </div>
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const registerForm = document.getElementById('register-form');
      const errorMessage = document.getElementById('error-message');
      const googleRegisterBtn = document.getElementById('google-register');
      
      // Backend API URL
      const API_URL = 'http://localhost:8000/api';
      
      registerForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;
        
        try {
          errorMessage.classList.add('hidden');
          
          const response = await axios.post(`${API_URL}/auth/register`, {
            name: name,
            email: email,
            password: password,
            password_confirmation: passwordConfirmation
          });
          
          // Store token in localStorage
          localStorage.setItem('auth_token', response.data.token);
          localStorage.setItem('user_id', response.data.user.id);
          
          // Redirect to dashboard
          window.location.href = '{{ route("elearning.beranda") }}';
        } catch (error) {
          errorMessage.textContent = error.response?.data?.message || 'Registration failed. Please try again.';
          errorMessage.classList.remove('hidden');
        }
      });
      
      googleRegisterBtn.addEventListener('click', async function() {
        try {
          const response = await axios.get(`${API_URL}/google/initiate`);
          window.location.href = response.data.url;
        } catch (error) {
          errorMessage.textContent = 'Failed to connect to Google. Please try again.';
          errorMessage.classList.remove('hidden');
        }
      });
    });
  </script>
</body>
</html>

