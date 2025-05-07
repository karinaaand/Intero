<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Login LMS SATAS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-white flex items-center justify-center min-h-screen">

  <div class="max-w-md w-full">
    <h2 class="text-center font-bold text-xl mb-6">Log in to LMS SATAS</h2>

    <form class="border border-black rounded-lg p-6 space-y-5 shadow-sm">
      <!-- Email -->
      <div>
        <label for="email" class="block font-semibold mb-1 text-black">Email</label>
        <input
          type="email"
          id="email"
          placeholder="Enter your email"
          class="w-full border border-gray-300 rounded-md px-3 py-2 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-black"
        />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block font-semibold mb-1 text-black">Password</label>
        <input
          type="password"
          id="password"
          placeholder="Enter your password"
          class="w-full border border-gray-300 rounded-md px-3 py-2 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-black"
        />
      </div>

      <!-- Login Button -->
      <button
        type="submit"
        class="w-full bg-green-700 text-white font-semibold rounded-md py-2 shadow-[0_4px_0_rgba(0,0,0,0.2)] hover:bg-green-800 transition-colors"
      >
        Login
      </button>

      <!-- Divider -->
      <hr class="border-t border-gray-300"/>

      <!-- Google Login -->
      <button
        type="button"
        class="w-full flex items-center rounded-md overflow-hidden shadow-[0_4px_0_rgba(0,0,0,0.2)]"
      >
        <div class="bg-white px-4 py-2 flex items-center justify-center border border-blue-600">
        <img
            src="https://developers.google.com/identity/images/g-logo.png"
            alt="Google G logo"
            class="w-5 h-5"
            />
        </div>
        <a href="{{ route('elearning.login') }}" class="text-white bg-blue-600 px-4 py-2 text-sm font-normal flex-1 text-center">
            Connect with your Google Account
        </a>
      </button>
    </form>
  </div>

</body>
</html>
