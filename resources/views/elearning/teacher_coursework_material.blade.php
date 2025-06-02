<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LMS SATAS Assignment</title>
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
                <a href="#" class="hover:underline">Home</a>
                <a href="#" class="relative text-blue-700 font-semibold hover:underline">
                    E-Learning
                    <span class="absolute bottom-0 left-0 right-0 h-[2px] bg-blue-700 rounded"></span>
                </a>
            </nav>
        </div>
        <div class="flex items-center space-x-8 text-sm font-normal leading-5">
            <span class="text-green-700">Token Refresh</span>
            <button class="text-blue-700 hover:underline flex items-center space-x-1">
                <span>Guy Hawkins, S.Pd.</span>
                <i class="fas fa-chevron-down text-xs"></i>
            </button>
        </div>


    </header>

    <main class="p-6">
        <div class="flex justify-end mb-5"> <!-- Parent dengan flex -->
            <button onclick="window.location.href='{{ route('elearning.teacher.coursework') }}'"
                    class="bg-blue-800 text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-blue-900 focus:outline-none">
                Post
            </button>
        </div>

        <section class="flex flex-col md:flex-row border border-gray-300 rounded-lg overflow-hidden max-w-7xl mx-auto"
            style="min-height: 400px">
            <div
                class="flex-1 p-4 md:p-6 space-y-4 border-b md:border-b-0 md:border-r border-gray-300 rounded-t-lg md:rounded-t-none md:rounded-l-lg">
                <header class="flex items-center space-x-3 mb-2">
                    <button aria-label="Close" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                    <button aria-label="Assignment icon"
                        class="bg-gray-300 text-gray-600 rounded-full p-2 cursor-default" disabled>
                        <i class="fas fa-file-alt text-sm"></i>
                    </button>
                    <h2 class="text-gray-600 font-semibold text-lg leading-6 select-none">Material</h2>
                </header>

                <form class="space-y-4 bg-white rounded-lg border border-gray-300 p-4">
                    <input type="text" value="TUGAS BAB 1"
                        class="w-full bg-gray-200 text-gray-600 text-sm font-normal leading-5 px-4 py-3 border-b border-gray-700 focus:outline-none"
                        readonly />
                    <textarea rows="4"
                        class="w-full bg-gray-200 text-gray-600 text-xs font-normal leading-5 px-4 py-3 border-b border-gray-700 resize-none focus:outline-none"
                        readonly>http://hdiabfpiaflhLFBljbf;HWFLHFLKAGWLKBAG</textarea>
                </form>
            </div>

            <aside class="w-full md:w-72 p-4 md:p-6 space-y-6 rounded-b-lg md:rounded-b-none md:rounded-r-lg">
                <div>
                    <label class="block text-xs font-semibold leading-4 mb-1">For</label>
                    <div
                        class="bg-gray-200 text-gray-600 text-xs font-normal leading-5 rounded-md px-4 py-3 select-none">
                        Kimia X MIPA 1
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold leading-4 mb-1">Points</label>
                    <div
                        class="bg-gray-200 text-gray-600 text-xs font-normal leading-5 rounded-md px-4 py-3 flex justify-between items-center cursor-pointer select-none">
                        100
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold leading-4 mb-1">Due</label>
                    <div
                        class="bg-gray-200 text-gray-600 text-xs font-normal leading-5 rounded-md px-4 py-3 flex justify-between items-center cursor-pointer select-none">
                        No due date
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </aside>
        </section>
    </main>
</body>

</html>
