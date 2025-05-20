<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Google Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
      body {
        font-family: "Roboto", sans-serif;
      }
    </style>
  </head>
  <body class="flex flex-col items-center justify-center min-h-screen bg-white text-[#3c4043] p-4">

    <!-- Kontainer utama dengan border -->
    <div class="w-full max-w-sm border border-gray-300 rounded-xl p-6 text-sm mb-4">
      <!-- Logo dan judul -->
      <div class="flex items-center space-x-2 mb-6">
        <img
            src="https://developers.google.com/identity/images/g-logo.png"
            alt="Google G logo"
            class="w-5 h-5"
        />
        <span class="text-[14px]">Sign in with Google</span>
      </div>

      <!-- Heading -->
      <h1 class="text-center text-lg font-normal text-[#202124] mb-1">
        Choose an account
      </h1>
      <p class="text-center text-sm mb-6">
        to continue to
        <a href="#" class="text-blue-600 hover:underline">LMS SATAS</a>
      </p>

      <!-- Loading indicator -->
      <div id="loading" class="text-center py-4">
        <p>Connecting to Google...</p>
      </div>

      <!-- Error message -->
      <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 hidden"></div>

      <!-- Connect button -->
      <button id="connect-google" class="w-full mt-4 bg-blue-600 text-white py-2 px-4 rounded-md text-sm font-medium">
        Connect to Google Classroom
      </button>
    </div>

    <!-- Footer di luar border -->
    <div class="flex justify-between w-full max-w-sm text-xs text-gray-600">
      <div class="flex items-center space-x-1 cursor-pointer">
        <span>English (United States)</span>
        <i class="fas fa-caret-down text-xs"></i>
      </div>
      <div class="flex space-x-4">
        <a href="#" class="hover:underline">Help</a>
        <a href="#" class="hover:underline">Privacy</a>
        <a href="#" class="hover:underline">Terms</a>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const connectGoogleBtn = document.getElementById('connect-google');
        const errorMessage = document.getElementById('error-message');
        const loading = document.getElementById('loading');
        
        // Backend API URL
        const API_URL = 'http://localhost:8000/api';
        
        // Check if user is authenticated
        const token = localStorage.getItem('auth_token');
        if (!token) {
          window.location.href = '{{ route("elearning.login") }}';
          return;
        }
        
        connectGoogleBtn.addEventListener('click', async function() {
          try {
            loading.classList.remove('hidden');
            errorMessage.classList.add('hidden');
            
            const response = await axios.get(`${API_URL}/google/initiate`, {
              headers: {
                'Authorization': `Bearer ${token}`
              }
            });
            
            window.location.href = response.data.url;
          } catch (error) {
            loading.classList.add('hidden');
            errorMessage.textContent = error.response?.data?.message || 'Failed to connect to Google. Please try again.';
            errorMessage.classList.remove('hidden');
          }
        });
      });
    </script>
  </body>
</html>

