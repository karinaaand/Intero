<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Google Sign In</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="bg-white flex justify-center items-center min-h-screen p-4">
  <div class="w-full max-w-md border border-gray-300 rounded-lg shadow-sm hover:shadow-md transition-shadow select-none" style="color: #202124;">
    <!-- Top bar -->
    <div class="flex items-center gap-2 px-4 py-2 border-b border-gray-300 rounded-t-lg">
      <img alt="Google G logo in color" class="block w-[18px] h-[18px]" src="https://storage.googleapis.com/a1aa/image/9d22e930-dc00-4954-c62a-39513c7bc4e4.jpg"/>
      <span class="text-gray-700 text-xs font-normal">
        Sign in with Google
      </span>
    </div>
    <!-- Main content -->
    <div class="px-4 sm:px-8 pt-6 sm:pt-8 pb-4 sm:pb-6 text-center">
      <h1 class="text-base sm:text-lg font-normal text-[#202124] mb-1">
        Choose an account
      </h1>
      <p class="text-xs text-[#3c4043] mb-4 sm:mb-6">
        to continue to
        <a class="text-blue-600 font-normal hover:underline" href="#">
          LMS SATAS
        </a>
      </p>
      <!-- Account 1 -->
      <a href="{{ route('elearning.mapel') }}" class="flex items-center gap-3 mb-4 hover:bg-gray-100 px-2 py-2 rounded-md transition-colors">
        <div aria-label="Account initial A" class="flex justify-center items-center rounded-full bg-purple-700 text-white font-medium text-sm w-8 h-8">
          A
        </div>
        <div class="flex flex-col text-left w-full border-b border-gray-300 pb-3">
          <span class="text-xs font-semibold text-[#202124]">
            Account Name
          </span>
          <span class="text-xs text-[#5f6368]">
            email@gmail.com
          </span>
        </div>
      </a>

      <!-- Account 2 -->
      <a href="{{ route('elearning.mapel') }}" class="flex items-center gap-3 mb-6 hover:bg-gray-100 px-2 py-2 rounded-md transition-colors">
        <div aria-label="Account initial A" class="flex justify-center items-center rounded-full bg-purple-700 text-white font-medium text-sm w-8 h-8">
          A
        </div>
        <div class="flex flex-col text-left w-full border-b border-gray-300 pb-3">
          <span class="text-xs font-semibold text-[#202124]">
            Account Name
          </span>
          <span class="text-xs text-[#5f6368]">
            email@gmail.com
          </span>
        </div>
      </a>
      <!-- Use another account -->
      <button class="flex items-center gap-2 text-xs text-[#3c4043] w-full border-b border-gray-300 pb-3 hover:bg-gray-100 rounded-sm transition-colors px-2 py-1" type="button">
        <i class="fas fa-user-circle text-base"></i>
        Use another account
      </button>
      <!-- Info text -->
      <p class="mt-4 sm:mt-6 text-xs text-[#5f6368] leading-tight">
        To continue, Google will share your name, email address, language preference, and profile picture with Company. Before using this app, you can review Company's
        <a class="text-blue-600 hover:underline" href="#">
          privacy policy
        </a>
        and
        <a class="text-blue-600 hover:underline" href="#">
          terms of service
        </a>.
      </p>
    </div>
    <!-- Footer -->
    <div class="flex flex-col sm:flex-row justify-between items-center text-xs text-[#5f6368] border-t border-gray-300 px-4 py-3 rounded-b-lg">
      <div class="flex items-center gap-1 cursor-pointer select-none mb-2 sm:mb-0">
        English (United States)
        <svg aria-hidden="true" class="w-3 h-3 text-[#5f6368]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </div>
      <div class="flex gap-4 sm:gap-6">
        <a class="hover:underline" href="#">
          Help
        </a>
        <a class="hover:underline" href="#">
          Privacy
        </a>
        <a class="hover:underline" href="#">
          Terms
        </a>
      </div>
    </div>
  </div>
</body>
</html>
