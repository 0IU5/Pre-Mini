@extends('layouts.app')

@section('content')
<section class="bg-gray-100 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8 min-h-screen">
    <div class="max-w-5xl mx-auto">
        <!-- Profile Header -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex flex-col md:flex-row items-center mb-4 md:mb-0">
                    <img class="h-32 w-32 rounded-full object-cover border-4 border-blue-500" src="{{ Auth::user()->photo_profil ? asset('storage/' . Auth::user()->photo_profil) : 'https://via.placeholder.com/150' }}" alt="Foto Profil">
                    <div class="md:ml-6 text-center md:text-left mt-4 md:mt-0">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">{{ Auth::user()->name }}</h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300">{{ Auth::user()->jenjang_pendidikan }} - {{ Auth::user()->kelas }}</p>
                        <p class="text-gray-500 dark:text-gray-400">{{ Auth::user()->alamat }}</p>
                    </div>
                </div>
                <div class="flex flex-col space-y-2">
                    <button class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-300">
                        Upload Foto
                    </button>
                    <button class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-300">
                        Hapus Profil
                    </button>
                </div>
            </div>
        </div>

        <!-- User Information -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 text-center ">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Informasi Pengguna</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</span>
                        <span class="text-lg text-gray-900 dark:text-white">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Lahir</span>
                        <span class="text-lg text-gray-900 dark:text-white">{{ Auth::user()->tanggal_lahir }}</span>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Alamat</span>
                        <span class="text-lg text-gray-900 dark:text-white">{{ Auth::user()->alamat }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Kelas</span>
                        <span class="text-lg text-gray-900 dark:text-white">{{ Auth::user()->kelas }}</span>
                    </div>
                </div>
                <div class="flex flex-col space-y-2 justify-center items-center ml-auto -mr-10">
                    <a href="{{ route('profile.edit') }}">
                        <button class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-300">Edit</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection