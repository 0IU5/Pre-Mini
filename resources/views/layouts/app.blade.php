<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0" defer></script>
    </head>
    <body class="flex flex-col min-h-screen bg-gray-600">
        <!-- Navbar -->
        <div class="navbar bg-base-100 mx-auto flex items-center px-5 py-8 shadow-lg w-full max-h-10">
            <!-- Tombol StarClass -->
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(228, 224, 15, 1); filter: drop-shadow(0 0 15px rgba(255, 255, 0, 0.8));">
                    <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"/>
                </svg>
                <a href="{{ route('dashboard') }}" class="text-2xl text-white">StarClass</a>
            </div>

            <!-- Tombol Hamburger -->
            <div x-data="{ open: false }" class="relative ml-1">
                    <button
                        @click="open = !open"
                        type="button"
                        class="p-1 w-10 h-10 text-sm text-gray-500 rounded-lg transition-transform duration-300 ease-in-out transform hover:scale-105 hover:text-indigo-500 hover:shadow-lg focus:outline-none"
                        :class="{ 'translate-x-24': open }"
                        aria-controls="navbar-hamburger"
                        aria-expanded="false">

                        <span class="sr-only">Open main menu</span>
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(243, 234, 234, 1);">
                            <path d="m13.061 4.939-2.122 2.122L15.879 12l-4.94 4.939 2.122 2.122L20.121 12z"></path>
                            <path d="M6.061 19.061 13.121 12l-7.06-7.061-2.122 2.122L8.879 12l-4.94 4.939z"></path>
                        </svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(243, 234, 234, 1);">
                            <path d="m8.121 12 4.94-4.939-2.122-2.122L3.879 12l7.06 7.061 2.122-2.122z"></path>
                            <path d="M17.939 4.939 10.879 12l7.06 7.061 2.122-2.122L15.121 12l4.94-4.939z"></path>
                        </svg>   
                        </svg>
                    </button>

                <!-- Sidebar -->
                <aside class="fixed inset-y-0 left-0 flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto bg-white border-r dark:bg-gray-900 dark:border-gray-700" x-show="open">
                    <div class="flex items-center justify-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(228, 224, 15, 1); filter: drop-shadow(0 0 15px rgba(255, 255, 0, 0.8));">
                            <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"/>
                        </svg>
                        <a href="{{ route('dashboard') }}" class="text-2xl text-white">StarClass</a>
                    </div>
                    <div class="relative mt-6">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                <path d="M21 21l-6-6M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <input type="text" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border rounded-md dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" placeholder="Search">
                    </div>
                    <nav class="flex-1 mt-6">
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-700 bg-gray-100 rounded-md dark:bg-gray-800 dark:text-gray-200">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"></path>
                            </svg>
                            <span class="mx-4 font-medium">Home</span>
                        </a>
                        <a href="{{ route('jadwal.index') }}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path>
                                <path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z"></path>
                            </svg>
                            <span class="mx-4 font-medium">Schedule</span>
                        </a>
                        <a href="{{ route('payment.index') }}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6H21"></path>
                                <path d="M6 6V21"></path>
                                <path d="M18 6V21"></path>
                                <path d="M6 9H18"></path>
                                <path d="M6 12H18"></path>
                                <path d="M6 15H18"></path>
                                <path d="M6 18H18"></path>
                                <path d="M18 6V4C18 2.89543 17.1046 2 16 2H8C6.89543 2 6 2.89543 6 4V6"></path>
                            </svg>
                            <span class="mx-4 font-medium">Payment</span>
                        </a>
                        <a href="{{ route('feedback.index') }}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"></path>
                                <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z"></path>
                            </svg>
                            <span class="mx-4 font-medium">Feedback</span>
                        </a>
                    </nav>
                </aside>
            </div>

            <!-- Konten Navbar -->
            <div class="navbar-content ml-auto flex items-center">
                <!-- Search -->
                <div class="form-control relative">
                    <input type="text" placeholder="Search" class="input input-bordered w-64 md:w-96 pl-10 mr-40 bg-white text-black" />
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(1, 0, 0, 1);" class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
                        <path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
                    </svg>
                </div>
                <!-- Teks Pengenalan -->
                <div class="text-white text-sm mr-4">
                    <p>Selamat datang di platform belajar kami!</p>
                </div>

                <!-- Tombol Registrasi -->
                <a href="{{ route('student.create') }}" class="btn btn-sm bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600">New Student!!</a>

                <!-- Profile -->
                <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                    <img
                        alt="Tailwind CSS Navbar component"
                        src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                    </div>
                </div>
                <ul     
                    tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li class="mb-2">
                        <span class="text-sm">{{ auth()->user()->name }}</span>
                    </li>
                    <li>
                    <a href="" class="justify-between">
                        Profile
                        <span class="badge">New</span>
                    </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="justify-between">Log out
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(128, 128, 128, 0.5);"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg>
                        </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-grow">
            <h1 class="text-3xl">@yield('title')</h1>
            <div>@yield('content')</div>
        </div>

</body>
</html>
