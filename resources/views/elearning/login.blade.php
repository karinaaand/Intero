</html>
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

      <!-- Akun-akun -->
      <div class="space-y-3 mb-6">
        <!-- Akun 1 -->
        <a
          href="{{ route('elearning.mapel') }}"
          class="w-full flex items-center space-x-3 border border-gray-300 rounded-md px-3 py-2 hover:bg-gray-100 transition"
        >
          <div
            class="flex items-center justify-center rounded-full bg-[#673ab7] text-white w-8 h-8 text-sm font-medium"
          >
            A
          </div>
          <div class="flex-1 text-left">
            <div class="text-sm text-[#202124] font-medium">Account Name</div>
            <div class="text-xs text-gray-600">email@gmail.com</div>
          </div>
        </a>

        <!-- Akun 2 -->
        <a
          href="{{ route('elearning.mapel') }}"
          class="w-full flex items-center space-x-3 border border-gray-300 rounded-md px-3 py-2 hover:bg-gray-100 transition"
        >
          <div
            class="flex items-center justify-center rounded-full bg-[#673ab7] text-white w-8 h-8 text-sm font-medium"
          >
            A
          </div>
          <div class="flex-1 text-left">
            <div class="text-sm text-[#202124] font-medium">Account Name</div>
            <div class="text-xs text-gray-600">email@gmail.com</div>
          </div>
        </a>

        <!-- Gunakan akun lain -->
        <button
          type="button"
          class="w-full flex items-center space-x-3 border border-gray-300 rounded-md px-3 py-2 hover:bg-gray-100 transition focus:outline-none"
        >
          <div
            class="flex items-center justify-center w-8 h-8 text-gray-600"
          >
            <i class="fas fa-user-circle text-xl"></i>
          </div>
          <div class="flex-1 text-left text-sm text-[#3c4043]">
            Use another account
          </div>
        </button>
      </div>

      <!-- Catatan kebijakan -->
      <p class="text-xs text-gray-600 leading-snug mb-2">
        To continue, Google will share your name, email address, language
        preference, and profile picture with Company. Before using this app, you
        can review Company’s
        <a href="#" class="text-blue-600 hover:underline">privacy policy</a> and
        <a href="#" class="text-blue-600 hover:underline">terms of service</a>.
      </p>
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

  </body>
</html>
