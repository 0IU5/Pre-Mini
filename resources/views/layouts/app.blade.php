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

        <style>
            aside {
                position: relative;
                z-index: 10; /* Z-index yang lebih tinggi dari elemen lain */
            }
        </style>
    </head>
    <body class="flex flex-col min-h-screen bg-gray-600" x-data="{ open: false }" @click.away="open = false">
        <!-- Navbar -->
        <div class="navbar bg-base-100 mx-auto flex items-center px-5 py-8 shadow-lg w-full max-h-10">
        <div x-data="{ open: false }">
    <!-- Tombol StarClass -->
    <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(228, 224, 15, 1); filter: drop-shadow(0 0 15px rgba(255, 255, 0, 0.8));">
            <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"/>
        </svg>
        <a href="javascript:void(0)" class="text-2xl text-white" @click="open = !open">StarClass</a>
    </div>

        <!-- Tombol Hamburger -->
        <div class="relative ml-1">
            <button
                @click="open = !open"
                type="button"
                class="p-1 w-10 h-10 text-sm text-gray-500 rounded-lg transition-transform duration-300 ease-in-out transform hover:scale-105 hover:text-indigo-500 hover:shadow-lg focus:outline-none"
                aria-controls="navbar-hamburger"
                aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="menu-icon" :class="{ 'open': open }" style="fill: rgba(243, 234, 234, 1);">
                    <path d="M6 12h12M6 6h12M6 18h12"></path>
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="menu-icon" :class="{ 'open': open }" style="fill: rgba(243, 234, 234, 1);">
                    <path d="M18 6L6 18M6 6l12 12"></path>
                </svg>   
            </button>

            <!-- Sidebar -->
            <aside
                class="fixed inset-y-0 left-0 flex flex-col w-64 h-screen px-4 py-8 overflow-y-auto bg-white border-r dark:bg-gray-900 dark:border-gray-700"
                x-show="open"
                @click.away="open = false"
                x-transition:enter="transition transform duration-300"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition transform duration-300"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                aria-label="Sidebar"
            >
                <!-- Konten Sidebar -->
                <div class="flex items-center justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(228, 224, 15, 1); filter: drop-shadow(0 0 15px rgba(255, 255, 0, 0.8));">
                        <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"/>
                    </svg>
                    <a href="{{ route('dashboard') }}" class="text-2xl text-white">StarClass</a>
                </div>
                <nav class="flex-1 mt-6">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 @if(Route::is('dashboard')) bg-gray-100 dark:bg-gray-800 dark:text-gray-200 @endif">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"></path>
                                </svg>
                                <span class="mx-4 font-medium">Home</span>
                            </a>
                            <a href="{{ route('paket.index') }}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 @if(Route::is('paket.index')) bg-gray-100 dark:bg-gray-800 dark:text-gray-200 @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(156, 163, 175, 1);">
                                    <path d="M21.993 7.95a.96.96 0 0 0-.029-.214c-.007-.025-.021-.049-.03-.074-.021-.057-.04-.113-.07-.165-.016-.027-.038-.049-.057-.075-.032-.045-.063-.091-.102-.13-.023-.022-.053-.04-.078-.061-.039-.032-.075-.067-.12-.094-.004-.003-.009-.003-.014-.006l-.008-.006-8.979-4.99a1.002 1.002 0 0 0-.97-.001l-9.021 4.99c-.003.003-.006.007-.011.01l-.01.004c-.035.02-.061.049-.094.073-.036.027-.074.051-.106.082-.03.031-.053.067-.079.102-.027.035-.057.066-.079.104-.026.043-.04.092-.059.139-.014.033-.032.064-.041.1a.975.975 0 0 0-.029.21c-.001.017-.007.032-.007.05V16c0 .363.197.698.515.874l8.978 4.987.001.001.002.001.02.011c.043.024.09.037.135.054.032.013.063.03.097.039a1.013 1.013 0 0 0 .506 0c.033-.009.064-.026.097-.039.045-.017.092-.029.135-.054l.02-.011.002-.001.001-.001 8.978-4.987c.316-.176.513-.511.513-.874V7.998c0-.017-.006-.031-.007-.048zm-10.021 3.922L5.058 8.005 7.82 6.477l6.834 3.905-2.682 1.49zm.048-7.719L18.941 8l-2.244 1.247-6.83-3.903 2.153-1.191zM13 19.301l.002-5.679L16 11.944V15l2-1v-3.175l2-1.119v5.705l-7 3.89z"></path>
                                </svg>
                                <span class="mx-4 font-medium">Paket</span>
                            </a>
                            <a href="{{ route('payment.index') }}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 @if(Route::is('payment.index')) bg-gray-100 dark:bg-gray-800 dark:text-gray-200 @endif">
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
                            <a href="{{ route('mapel.index') }}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 @if(Route::is('mapel.index')) bg-gray-100 dark:bg-gray-800 dark:text-gray-200 @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(156, 163, 175, 1);">
                                    <path d="M6 22h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3zM5 8V5c0-.805.55-.988 1-1h13v12H5V8z"></path>
                                    <path d="M8 6h9v2H8z"></path>
                                </svg>
                                <span class="mx-4 font-medium">Mapel</span>
                            </a>
                            <a href="{{ route('guru.index') }}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 @if(Route::is('guru.index')) bg-gray-100 dark:bg-gray-800 dark:text-gray-200 @endif">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"></path>
                                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z"></path>
                                </svg>
                                <span class="mx-4 font-medium">Guru</span>
                            </a>         
                            <a href="{{ route('jadwal.index') }}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 @if(Route::is('jadwal.index')) bg-gray-100 dark:bg-gray-800 dark:text-gray-200 @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path>
                                    <path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z"></path>
                                </svg>
                                <span class="mx-4 font-medium">Jadwal</span>
                            </a>
                            <a href="{{ route('feedback.index') }}" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 @if(Route::is('feedback.index')) bg-gray-100 dark:bg-gray-800 dark:text-gray-200 @endif">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(156, 163, 175, 1);">
                                    <path d="M17.726 13.02 14 16H9v-1h4.065a.5.5 0 0 0 .416-.777l-.888-1.332A1.995 1.995 0 0 0 10.93 12H3a1 1 0 0 0-1 1v6a2 2 0 0 0 2 2h9.639a3 3 0 0 0 2.258-1.024L22 13l-1.452-.484a2.998 2.998 0 0 0-2.822.504zm1.532-5.63c.451-.465.73-1.108.73-1.818s-.279-1.353-.73-1.818A2.447 2.447 0 0 0 17.494 3S16.25 2.997 15 4.286C13.75 2.997 12.506 3 12.506 3a2.45 2.45 0 0 0-1.764.753c-.451.466-.73 1.108-.73 1.818s.279 1.354.73 1.818L15 12l4.258-4.61z"></path>
                                </svg>
                                <span class="mx-4 font-medium">Feedback</span>
                            </a>
                </nav>
            </aside>
        </div>
    </div>


            <!-- Konten Navbar -->
            <div class="navbar-content ml-auto flex items-center">
                <!-- Search -->
                <div class="form-control relative">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="query" placeholder="Search halaman" class="input input-bordered w-64 md:w-96 pl-10 mr-40 bg-white text-black" />
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(1, 0, 0, 1);" class="absolute left-3 top-1/2 transform -translate-y-1/2">
                            <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
                            <path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
                        </svg>
                    </form>
                </div>
                <!-- Teks Pengenalan -->
                <div class="text-white text-sm mr-4">
                    <p>Selamat datang di platform belajar kami!</p>
                </div>

                <!-- Tombol Registrasi -->
                <a href="{{ route('register') }}" class="btn btn-sm bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600">New Student!!</a>

                <!-- Profile -->
                <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                    <img
                        alt="Tailwind CSS Navbar component"
                        src="./img/vector_profile.jpeg" />
                    </div>
                </div>
                <ul     
                    tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li class="mb-2">
                        <span class="text-sm">{{ auth()->user()->name }}</span>
                    </li>
                    <li>
                    <a href="{{ route('profile.index') }}" class="justify-between">
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