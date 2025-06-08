@extends('layouts.app')

@section('content')
<div class="bg-white flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full p-6">
        <h2 class="text-center font-bold text-xl mb-6">Log in to LMS SATAS</h2>

        <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 hidden">
        </div>

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
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  const baseUrl = "{{ env('VITE_API_BASE_URL') }}";

  document.getElementById('login-form').addEventListener('submit', async function(e) {
      e.preventDefault();
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;

      try {
          const response = await axios.post(`${baseUrl}/auth/login`, {
              email,
              password
          });

          const token = response.data.access_token;
          localStorage.setItem('token', token);

          // Redirect ke route elearning.beranda
          {{--  window.location.href = "{{ route('elearning.home') }}";  --}}

          if (email.toLowerCase() === 'theprocrastinatorman@gmail.com') {
              window.location.href = "{{ route('elearning.home') }}";
          } else if (email.toLowerCase() === 'ibnumknd@gmail.com') {
              window.location.href = "{{ route('elearning.student.home') }}";
          } else {
              window.location.href = "{{ route('elearning.home') }}"; // fallback default
          }

      } catch (error) {
          console.error(error);
          const message = error.response?.data?.message || 'Login failed';
          const errorMessageDiv = document.getElementById('error-message');
          errorMessageDiv.classList.remove('hidden');
          errorMessageDiv.innerText = message;
      }
  });
</script>
@endsection
