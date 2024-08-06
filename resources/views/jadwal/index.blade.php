@extends('layouts.app')

@section('content')
<section class="bg-gray-600 dark:bg-gray-900 min-h-screen">
    <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
        <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
            <div>
                <a href="{{ route('jadwal.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Tambah Jadwal
                </a>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="table-search-users" name="search" value="{{ request()->input('search') }}" class="block w-80 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
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
                            <td class="px-6 py-4 flex items-center space-x-2">
                                <a href="{{ route('jadwal.edit', $data->id_jadwal) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('jadwal.destroy', $data->id_jadwal) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-500 hover:underline ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div id="popup-modal-{{ $data->id_jadwal }}" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                            <div class="relative p-4 w-full max-w-md mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="hideModal({{ $data->id_jadwal }})">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>    
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this jadwal?</h3>
                                    <form action="{{ route('jadwal.destroy', $data->id_jadwal) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Yes, I'm sure
                                        </button>
                                    </form>
                                    <button onclick="hideModal({{ $data->id_jadwal }})" type="button" class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    function showModal(jadwalId) {
        document.getElementById('popup-modal-' + jadwalId).classList.remove('hidden');
    }

    function hideModal(jadwalId) {
        document.getElementById('popup-modal-' + jadwalId).classList.add('hidden');
    }
</script>
@endsection
