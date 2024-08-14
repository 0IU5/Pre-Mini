@extends('layouts.app')

@section('content')
<section class="bg-gray-600 dark:bg-gray-900 min-h-screen">
    <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
        @if (session('success'))
        <div id="alert-success" class="bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 py-3 px-5 mb-4 rounded flex justify-between items-center">
            {{ session('success') }}
            <button onclick="document.getElementById('alert-success').style.display='none'" class="text-green-700 dark:text-green-300 ml-4">&times;</button>
        </div>
        @endif

        <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
            <div>
                <a href="{{ route('jadwal.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Tambah Jadwal
                </a>
            </div>

            <div class="ml-auto">
                <form method="GET" action="{{ route('jadwal.index') }}">
                    <input type="text" name="search" placeholder="Search nama siswa" value="{{ $search ?? '' }}" class="px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Cari
                    </button>
                </form>
            </div>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
            @forelse($jadwal as $data)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-bold text-blue-400 dark:text-blue">
                        {{ $data->payment->nama ?? '-' }}
                    </h2>

                    <p class="text-gray-700 dark:text-gray-300">
                        @if ($data->payment && $data->payment->paket)
                            {{ $data->payment->paket->paket ?? '-' }}
                        @else
                            -
                        @endif
                    </p>

                    <div class="text-center mt-6">
                        <button onclick="showModal({{ $data->id_jadwal }})" class="bg-green-500 text-white px-6 py-2 hover:bg-green-600 transition rounded-full w-36">Detail</button>
                    </div>
                </div>
                <div class="p-4 bg-gray-50 dark:bg-gray-700 flex justify-between">
                    <a href="{{ route('jadwal.edit', $data->id_jadwal) }}" class="text-yellow-600 dark:text-yellow-500 hover:underline">Edit</a>
                </div>
            </div>

            <!-- Modal -->
            <div id="popup-modal-{{ $data->id_jadwal }}" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                <div class="relative p-4 w-full max-w-md mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="hideModal({{ $data->id_jadwal }})">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div id="modal-content-{{ $data->id_jadwal }}" class="p-4 md:p-5 text-center">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Jadwal Siswa Bimbel</h2>
                        <p class="text-gray-700 dark:text-gray-300 font-semibold mb-2">
                            Nama Guru: 
                            @if ($data->guru && is_object($data->guru))
                                <span class="font-normal text-lg">{{ $data->guru->nama ?? '-' }}</span>
                            @else
                                <span class="font-normal text-lg">-</span>
                            @endif
                        </p>
                        <p class="text-gray-700 dark:text-gray-300 font-semibold mb-2">
                            Mapel: 
                            @if ($data->guru && $data->guru->mapel && is_object($data->guru->mapel))
                                <span class="font-normal text-lg">{{ $data->guru->mapel->mapel ?? '-' }}</span>
                            @else
                                <span class="font-normal text-lg">-</span>
                            @endif
                        </p>
                        <p class="text-gray-700 dark:text-gray-300 font-semibold mb-2">
                            Hari: 
                            <span class="font-normal text-lg">{{ $data->hari ?? '-' }}</span>
                        </p>
                        <p class="text-gray-700 dark:text-gray-300 font-semibold mb-2">
                            Start: 
                            <span class="font-normal text-lg">{{ \Carbon\Carbon::parse($data->start_time)->format('h:i A') ?? '-' }}</span>
                        </p>
                        <p class="text-gray-700 dark:text-gray-300 font-semibold mb-4">
                            End: 
                            <span class="font-normal text-lg">{{ \Carbon\Carbon::parse($data->end_time)->format('h:i A' ) ?? '-' }}</span>
                        </p>

                        <!-- Button Delete Confirmation -->
                        <button id="confirm-delete-button-{{ $data->id_jadwal }}" class="hidden text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center" onclick="confirmDelete({{ $data->id_jadwal }})">
                            Yes, I'm sure
                        </button>

                        <!-- Form for Deleting -->
                        <form id="delete-form-{{ $data->id_jadwal }}" action="{{ route('jadwal.destroy', $data->id_jadwal) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>

                        <!-- Button to show the delete confirmation -->
                        <button id="show-delete-confirmation-button-{{ $data->id_jadwal }}" class="text-red-600 dark:text-red-500 hover:underline" onclick="showDeleteConfirmation({{ $data->id_jadwal }})">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-1 sm:col-span-2 md:col-span-3 lg:col-span-4 text-center text-gray-500 dark:text-gray-400">
                Data tidak ada.
            </div>
            @endforelse
        </div>
    </div>
</section>

<script>
    function showModal(jadwalId) {
        document.getElementById('popup-modal-' + jadwalId).classList.remove('hidden');
        document.getElementById('confirm-delete-button-' + jadwalId).classList.add('hidden'); // Ensure "Yes, I'm sure" is hidden initially
        document.getElementById('show-delete-confirmation-button-' + jadwalId).classList.remove('hidden'); // Ensure "Delete" button is visible initially
    }

    function hideModal(jadwalId) {
        document.getElementById('popup-modal-' + jadwalId).classList.add('hidden');
    }

    function showDeleteConfirmation(jadwalId) {
        document.getElementById('confirm-delete-button-' + jadwalId).classList.remove('hidden');
        document.getElementById('show-delete-confirmation-button-' + jadwalId).classList.add('hidden');
    }

    function confirmDelete(jadwalId) {
        document.getElementById('delete-form-' + jadwalId).submit();
    }
</script>
@endsection
