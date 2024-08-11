@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900 min-h-screen py-12">
    <div class="mx-auto max-w-6xl">
        <h2 class="mb-6 text-3xl font-bold text-gray-900 dark:text-white">Daftar Guru</h2>

        <div class="flex justify-end mb-4">
            <form method="GET" action="{{ route('guru.index') }}" class="relative w-full max-w-sm">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="table-search" name="search" value="{{ request()->input('search') }}" class="block w-full pl-10 pr-16 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari guru">
                    <button type="submit" class="absolute right-0 top-0 mt-2 mr-3 text-blue-600 dark:text-blue-400">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 19l-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>        

        @if (session('success'))
            <div id="alert-success" class="bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300 py-3 px-5 mb-4 rounded flex justify-between items-center">
                {{ session('success') }}
                <button onclick="document.getElementById('alert-success').style.display='none'" class="text-green-700 dark:text-green-300 ml-4">&times;</button>
            </div>
        @endif
        @if (session('update'))
            <div id="alert-update" class="bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300 py-3 px-5 mb-4 rounded flex justify-between items-center">
                {{ session('update') }}
                <button onclick="document.getElementById('alert-update').style.display='none'" class="text-yellow-700 dark:text-yellow-300 ml-4">&times;</button>
            </div>
        @endif
        @if (session('delete'))
            <div id="alert-delete" class="bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 py-3 px-5 mb-4 rounded flex justify-between items-center">
                {{ session('delete') }}
                <button onclick="document.getElementById('alert-delete').style.display='none'" class="text-red-700 dark:text-red-300 ml-4">&times;</button>
            </div>
        @endif

        @if (session('error'))
            <div id="alert-error" class="bg-red-700 text-white py-3 px-5 mb-4 rounded flex justify-between items-center">
                {{ session('error') }}
                <button onclick="document.getElementById('alert-error').style.display='none'" class="text-white ml-4">&times;</button>
            </div>
        @endif

        <div class="mb-6">
            <a href="{{ route('guru.create') }}" class="inline-flex items-center px-5 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Tambah Guru Baru
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($guru as $guruItem)
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg">
                    <div class="relative h-48">
                        <img alt="Foto Guru" class="w-full h-full object-cover rounded-t-lg" src="{{ asset('storage/' . $guruItem->foto) }}">
                    </div>
                    <div class="p-6">
                        <h2 class="text-indigo-500 text-xl font-semibold">{{ $guruItem->nama }}</h2>
                        <p class="text-gray-800 dark:text-gray-300 mt-2">Mapel: <span class="font-medium">{{ $guruItem->mapel->mapel }}</span></p>
                        <p class="text-gray-800 dark:text-gray-300 mt-1">Umur: <span class="font-medium">{{ $guruItem->umur }}</span></p>
                        <p class="text-gray-800 dark:text-gray-300 mt-1">Pendidikan: <span class="font-medium">{{ $guruItem->pendidikan_terakhir }}</span></p>
                    </div>
                    <div class="p-4 bg-gray-200 dark:bg-gray-700 flex justify-between items-center">
                        <a href="{{ route('guru.edit', $guruItem->id_guru) }}" class="px-4 py-2 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600">Edit</a>
                        <button type="button" onclick="showModal({{ $guruItem->id_guru }})" class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600">Hapus</button>
                    </div>
                </div>

                <div id="popup-modal-{{ $guruItem->id_guru }}" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                    <div class="bg-white rounded-lg shadow dark:bg-gray-800 w-full max-w-md p-6">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg p-1.5 focus:outline-none" onclick="hideModal({{ $guruItem->id_guru }})">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        <div class="text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda yakin ingin menghapus guru ini?</h3>
                            <form action="{{ route('guru.destroy', $guruItem->id_guru) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5">Ya, saya yakin</button>
                            </form>
                            <button onclick="hideModal({{ $guruItem->id_guru }})" class="mt-3 text-gray-900 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600 border-gray-200 border hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-5 py-2.5">Tidak, batal</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10 text-gray-700 dark:text-gray-300">Tidak ada data guru.</div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $guru->appends(['search' => request()->input('search')])->links() }}
        </div>
    </div>
</section>

<script>
    function showModal(guruId) {
        document.getElementById('popup-modal-' + guruId).classList.remove('hidden');
    }

    function hideModal(guruId) {
        document.getElementById('popup-modal-' + guruId).classList.add('hidden');
    }
</script>
@endsection
