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
    <div class="navbar bg-base-100 flex items-center justify-center px-5 py-8 shadow-lg w-full">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(228, 224, 15, 1); filter: drop-shadow(0 0 15px rgba(255, 255, 0, 0.8));">
                <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"/>
            </svg>
            <a href="{{ route('dashboard') }}" class="text-2xl text-white">StarClass</a>
        </div>

        <!-- Konten Navbar -->
        <div class="navbar-content flex justify-center items-center w-full space-x-4">
            <!-- navbar link -->
            <a href="{{ route('dashboard') }}" 
            class="text-gray-600 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-blue-600 rounded-md px-3 py-2
            {{ Route::is('dashboard') ? 'bg-blue-600 font-bold text-white dark:text-white rounded-md px-3 py-2' : '' }}">
            Beranda
            </a>
            <a href="{{ route('paket.index') }}" 
            class="text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-blue-600 rounded-md px-3 py-2  
            {{ Route::is('paket.index') ? 'bg-blue-600 font-bold text-white dark:text-white rounded-md px-3 py-2' : '' }}">
            Paket
            </a>
            <a href="{{ route('payment.index') }}" 
            class="text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-blue-600 rounded-md px-3 py-2 
            {{ Route::is('payment.index') ? 'bg-blue-600 font-bold text-white dark:text-white rounded-md px-3 py-2' : '' }}">
            Pembayaran
            </a>
            <a href="{{ route('mapel.index') }}" 
            class="text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-blue-600 rounded-md px-3 py-2 
            {{ Route::is('mapel.index') ? 'bg-blue-600 font-bold dark:text-white text-white rounded-md px-3 py-2' : '' }}">
            Mapel
            </a>
            <a href="{{ route('guru.index') }}" 
            class="text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-blue-600 rounded-md px-3 py-2 
            {{ Route::is('guru.index') ? 'bg-blue-600 font-bold text-white dark:text-white rounded-md px-3 py-2' : '' }}">
            Guru
            </a>
            <a href="{{ route('jadwal.index') }}" 
            class="text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-blue-600 rounded-md px-3 py-2
            {{ Route::is('jadwal.index') ? 'bg-blue-600 font-bold text-white dark:text-white rounded-md px-3 py-2' : '' }}">
            Jadwal
            </a>
            <a href="{{ route('feedback.index') }}" 
            class="text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-blue-600 rounded-md px-3 py-2 
            {{ Route::is('feedback.index') ? 'bg-blue-600 font-bold text-white dark:text-white rounded-md px-3 py-2' : '' }}">
            Masukkan
            </a>
        </div>


        <!-- Search & Profile -->
        <div class="relative flex items-center ml-auto space-x-4">
            <!-- Search -->
            <form action="{{ route('search') }}" method="GET" class="relative">
                <input type="text" name="query" placeholder="Cari halaman" class="input input-bordered w-64 md:w-64 pl-10 bg-dash text-black" />
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(1, 0, 0, 1);" class="absolute left-3 top-1/2 transform -translate-y-1/2">
                    <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
                    <path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
                </svg>
            </form>

            <!-- Profile -->
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="/img/vector_profile.jpeg" />
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li class="mb-2">
                        <span class="text-sm">{{ auth()->user()->name }}</span>
                    </li>
                    <li>
                        <a href="{{ route('profile.index') }}" class="justify-between">
                            Profil
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="justify-between">Keluar
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
