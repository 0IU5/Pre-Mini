@extends('layouts.app')

@section('content')
<section class="bg-gray-600">
    <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
        <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
            <div>
                <a href="{{ route('jadwal.create') }}" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    <span class="sr-only">Tambah Jadwal</span>
                    Tambah Jadwal
                </a>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="table-search-users" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
            </div>
        </div>

        <div class="relative overflow-x-auto bg-white shadow-md dark:bg-gray-900 sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nama Guru</th>
                        <th scope="col" class="px-6 py-3">Nama Siswa</th>
                        <th scope="col" class="px-6 py-3">Paket</th>
                        <th scope="col" class="px-6 py-3">Mata Pelajaran</th>
                        <th scope="col" class="px-6 py-3">Start</th>
                        <th scope="col" class="px-6 py-3">End</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwal as $data)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $data->payment->nama }}</td>
                            <td class="px-6 py-4">{{ $data->guru->nama }}</td>
                            <td class="px-6 py-4">{{ $data->paket->paket }}</td>
                            <td class="px-6 py-4">{{ $data->mapel->mapel }}</td>
                            <td class="px-6 py-4">{{ $data->start_time }}</td>
                            <td class="px-6 py-4">{{ $data->end_time }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('jadwal.edit', $data->id_jadwal) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('jadwal.destroy', $data->id_jadwal) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-500 hover:underline ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection