@extends('layouts.app')

@section('content')
<div class="bg-white flex items-center justify-center min-h-screen">
  <div class="max-w-md w-full p-6">
    <h2 class="text-center font-bold text-xl mb-6">Log in to LMS SATAS</h2>

    <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 hidden"></div>

    <form id="login-form" class="space-y-4">
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2 border">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2 border">
      </div>

      <div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Log in
        </button>
      </div>

      <div class="text-center mt-4">
        <a href="{{ route('elearning.register') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
          Don't have an account? Sign up
        </a>
      </div>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    const errorMessage = document.getElementById('error-message');
    const API_BASE_URL = 'http://localhost:8001/api';

    loginForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Show loading state
        const submitButton = loginForm.querySelector('button[type="submit"]');
        const originalButtonText = submitButton.innerHTML;
        submitButton.disabled = true;
        submitButton.innerHTML = `
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Logging in...
        `;

        try {
            errorMessage.classList.add('hidden');

            const response = await fetch(`${API_BASE_URL}/auth/login`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    email: document.getElementById('email').value.trim(),
                    password: document.getElementById('password').value
                }),
                credentials: 'include'
            });

            if (!response.ok) {
                const errorData = await response.json().catch(() => ({}));
                throw new Error(errorData.message || `Login failed with status ${response.status}`);
            }

            const data = await response.json();

            if (!data.access_token) {
                throw new Error('Invalid server response');
            }

            // Store tokens and user data
            localStorage.setItem('auth_token', data.access_token);
            if (data.expires_at) {
                localStorage.setItem('token_expires_at', data.expires_at);
            }
            if (data.user?.id) {
                localStorage.setItem('user_id', data.user.id);
            }

            window.location.href = '{{ route("elearning.beranda") }}';

        } catch (error) {
            console.error('Login error:', error);
            errorMessage.textContent = error.message || 'Login failed. Please try again.';
            errorMessage.classList.remove('hidden');
        } finally {
            submitButton.disabled = false;
            submitButton.innerHTML = originalButtonText;
        }
    });
});
</script>
@endsection
