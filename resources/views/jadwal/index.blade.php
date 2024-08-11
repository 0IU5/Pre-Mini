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
                    
                        <div style="text-align: center; margin-top: 35px;">
                            <a href="{{ route('jadwal.show', $data->id_jadwal) }}" class="bg-green-500 text-white px-6 py-2 hover:bg-green-600 transition" style="border-radius: 20px; width: 150px; text-align: center;">Detail</a>
                        </div>       

                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-gray-700 flex justify-between">
                        <a href="{{ route('jadwal.edit', $data->id_jadwal) }}" class="text-yellow-600 dark:text-yellow-500 hover:underline">Edit</a>
                        <button onclick="showModal({{ $data->id_jadwal }})" class="text-red-600 dark:text-red-500 hover:underline">Delete</button>
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
                        <div class="col-span-1 sm:col-span-2 md:col-span-3 lg:col-span-4 text-center text-gray-500 dark:text-gray-400">
                            No data available
                        </div>
                    @endforelse
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
