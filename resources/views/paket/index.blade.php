@extends('layouts.app')

@section('content')
<section class="bg-gray-600">
    <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
        <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Paket BIMBEL</h2>
                <a href="{{ route('paket.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Tambah Paket</a>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 text-green-800 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-300" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('update'))
                <div class="mb-4 p-4 text-green-800 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-300" role="alert">
                    {{ session('update') }}
                </div>
            @endif
            @if (session('delete'))
                <div class="mb-4 p-4 text-green-800 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-300" role="alert">
                    {{ session('delete') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 p-4 text-red-800 bg-red-100 rounded-lg dark:bg-red-900 dark:text-red-300" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($paket as $p)
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-blue-500 dark:text-blue mb-2 -mt-4">{{ $p->paket }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mt-2 mb-2 max-h-24 overflow-hidden overflow-ellipsis">
                            <span class="font-bold text-gray-900 dark:text-white">Deskripsi:</span> {{ $p->deskripsi }}
                        </p>                            
                        <p class="text-gray-600 dark:text-gray-400 mt-2">
                            <span class="font-bold text-gray-900 dark:text-white">Harga:</span> Rp.{{ number_format($p->harga, 0, ',', '.') }}/Bulan
                        </p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 p-4 flex justify-between items-center">
                        <a href="{{ route('paket.edit', $p->id_paket) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                            Edit
                        </a>
                        <button type="button" onclick="showModal({{ $p->id_paket }})" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                            Hapus
                        </button>
                        <a href="{{ route('jaket.index') }}" class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300">
                            Jadwal
                        </a>                            
                    </div>
                </div>                
                    <!-- Modal -->
                    <div id="popup-modal-{{ $p->id_paket }}" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                        <div class="relative p-4 w-full max-w-md mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="hideModal({{ $p->id_paket }})">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>    
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this paket?</h3>
                                <form action="{{ route('paket.destroy', $p->id_paket) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Yes, I'm sure
                                    </button>
                                </form>
                                <button onclick="hideModal({{ $p->id_paket }})" type="button" class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-white">Tidak ada data paket.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<script>
    function showModal(serviceId) {
        document.getElementById('popup-modal-' + serviceId).classList.remove('hidden');
    }

    function hideModal(serviceId) {
        document.getElementById('popup-modal-' + serviceId).classList.add('hidden');
    }
</script>
@endsection
