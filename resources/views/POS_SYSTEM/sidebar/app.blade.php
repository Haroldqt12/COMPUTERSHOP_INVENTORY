<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('name', 'Default Title')</title>
    {{-- Tailwind & Vite --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<style>
    .scrollbar-hide {
        overflow-y: auto;
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .scrollbar-hide ::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari, Opera */
    }
</style>

<body class="bg-gray-50 h-screen flex">

    <!-- Sidebar -->
    <div class="w-40 bg-white shadow-md h-full flex flex-col items-center p-5">

        <!-- Back Button -->
        <a href="{{ route('inventory') }}"
            class="inline-flex items-center gap-2 bg-[#2F3B49] text-white px-4 py-2 rounded-lg shadow hover:bg-[#3B4A5A] focus:ring-2 focus:ring-[#3B4A5A] transition duration-150 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>

        <ul class="navbar w-full space-y-4 mt-10 overflow-y-auto scrollbar-hide">
            @isset($categories)
                @foreach ($categories as $category)
                    <li value="{{ $category->id }}">
                        <button
                            class="w-full flex flex-col items-center p-4 border-2 border-orange-400 rounded-lg shadow-md text-orange-500"
                            aria-current="true">
                            <span class="text-sm font-semibold">{{ $category->category_name }}</span>
                        </button>
                    </li>
                @endforeach
            @endisset
        </ul>


    </div>

    <!-- Main Content Area -->
    <main class="flex-1 p-10 overflow-auto">
        @yield('content_items')
    </main>
</body>

</html>