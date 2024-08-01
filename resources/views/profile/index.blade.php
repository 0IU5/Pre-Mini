@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-800 py-8 px-4 sm:px-6 lg:py-12 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <!-- Bagian Kiri: Gambar Profil dan Info -->
        <div class="flex flex-col md:flex-row items-center md:items-start bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md">
            <div class="flex-shrink-0 mb-4 md:mb-0">
                <img class="h-32 w-32 rounded-full object-cover" src="https://via.placeholder.com/150" alt="Foto Profil">
                <div class="mt-4 text-center md:text-left">
                    <button class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">Ikuti</button>
                    <button class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5">Pesan</button>
                </div>
            </div>
            <div class="flex-grow md:ml-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Nama Pengguna</h2>
                <p class="text-gray-500 dark:text-gray-300">Placeholder - Isi teks yang diinginkan di sini.</p>
                <div class="mt-4 space-y-2">
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">Nama Lengkap:</span>
                        <span class="text-gray-900 dark:text-white">PlaceholderName</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">Email:</span>
                        <span class="text-gray-900 dark:text-white">PlaceholderEmail</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">Telepon:</span>
                        <span class="text-gray-900 dark:text-white">PlaceholderPhone</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">HP:</span>
                        <span class="text-gray-900 dark:text-white">PlaceholderMobile</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">Alamat:</span>
                        <span class="text-gray-900 dark:text-white">PlaceholderAddress</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bagian Kanan: Placeholder -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                <h3 class="font-bold text-gray-900 dark:text-white mb-4">Edit Teks di Sini</h3>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">Placeholder</span>
                        <div class="flex-grow bg-gray-200 dark:bg-gray-600 h-2 rounded-lg overflow-hidden ml-4">
                            <div class="w-1/2 h-full bg-blue-500"></div>
                        </div>
                    </div>
                    <!-- Tambahkan lebih banyak item sesuai kebutuhan -->
                </div>
            </div>
            <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
                <h3 class="font-bold text-gray-900 dark:text-white mb-4">Edit Teks di Sini</h3>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <span class="text-gray-500 dark:text-gray-400 w-24">Placeholder</span>
                        <div class="flex-grow bg-gray-200 dark:bg-gray-600 h-2 rounded-lg overflow-hidden ml-4">
                            <div class="w-1/2 h-full bg-blue-500"></div>
                        </div>
                    </div>
                    <!-- Tambahkan lebih banyak item sesuai kebutuhan -->
                </div>
            </div>
        </div>

        <!-- Bagian Media Sosial -->
        <div class="mt-6 bg-white dark:bg-gray-700 p-4 rounded-lg shadow-md">
            <h3 class="font-bold text-gray-900 dark:text-white mb-4">Media Sosial</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="flex items-center">
                    <span class="text-gray-500 dark:text-gray-400 w-24">Website</span>
                    <span class="text-gray-900 dark:text-white">Website</span>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-500 dark:text-gray-400 w-24">Twitter</span>
                    <span class="text-gray-900 dark:text-white">TwitterID</span>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-500 dark:text-gray-400 w-24">Facebook</span>
                    <span class="text-gray-900 dark:text-white">FacebookID</span>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-500 dark:text-gray-400 w-24">Instagram</span>
                    <span class="text-gray-900 dark:text-white">InstagramID</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
