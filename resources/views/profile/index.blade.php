@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-800 py-8 px-4 sm:px-6 lg:py-12 lg:px-8 min-h-screen">
    <div class="max-w-5xl mx-auto">
        <!-- Bagian Atas: Gambar Header dan Info Pengguna -->
        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <img class="h-32 w-32 rounded-full object-cover" src="{{ Auth::user()->photo_profil ? asset('storage/' . Auth::user()->photo_profil) : 'https://via.placeholder.com/150' }}" alt="Foto Profil">
                    <div class="ml-6">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ Auth::user()->name }}</h2>
                        <p class="text-gray-500 dark:text-gray-300">{{ Auth::user()->jenjang_pendidikan }} - {{ Auth::user()->alamat }}</p>
                        <p class="text-gray-500 dark:text-gray-300">{{ Auth::user()->kelas }}</p>
                    </div>
                </div>
                <button class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Upload Foto</button>
            </div>
        </div>

        <!-- Bagian Tengah: Informasi Pengguna -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                <h3 class="font-bold text-gray-900 dark:text-white mb-4">Informasi Pengguna</h3>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">Email:</span>
                        <span class="text-gray-900 dark:text-white">{{ Auth::user()->email }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">Tanggal Lahir:</span>
                        <span class="text-gray-900 dark:text-white">{{ Auth::user()->tanggal_lahir }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">Alamat:</span>
                        <span class="text-gray-900 dark:text-white">{{ Auth::user()->alamat }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">Kelas:</span>
                        <span class="text-gray-900 dark:text-white">{{ Auth::user()->kelas }}</span>
                    </div>
                </div>
            </div>

            <!-- Tambahkan lebih banyak item sesuai kebutuhan -->
            <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                <h3 class="font-bold text-gray-900 dark:text-white mb-4">Informasi Tambahan</h3>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">Proses:</span>
                        <div class="flex-grow bg-gray-200 dark:bg-gray-600 h-2 rounded-lg overflow-hidden ml-4">
                            <div class="w-1/2 h-full bg-blue-500"></div>
                        </div>
                    </div>
                    <!-- Tambahkan lebih banyak item sesuai kebutuhan -->
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
