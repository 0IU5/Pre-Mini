@extends('layouts.app')

@section('content')
<section class="bg-gray-600">
    <div class="py-8 px-4 mx-auto max-w-5xl lg:py-16">
        <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 text-center">Detail Jadwal Paket</h2>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200 dark:border-gray-700">Paket</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200 dark:border-gray-700">Hari</th>    
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        <!-- Baris untuk Paket A -->
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700">Paket A</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">Senin dan Selasa pagi</td>
                        </tr>
                        <!-- Baris untuk Paket B -->
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700">Paket B</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">Rabu dan Kamis siang</td>
                        </tr>
                        <!-- Baris untuk Paket C -->
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700">Paket C</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 border-b border-gray-200 dark:border-gray-700">Jum'at dan Sabtu Malam</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection