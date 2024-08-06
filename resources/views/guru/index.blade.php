@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="min-h-screen justify-center mx-auto max-w-5xl pt-12">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Daftar Guru</h2>

        <form method="GET" action="{{ route('guru.index') }}">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mb-4">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="table-search" name="search" value="{{ request()->input('search') }}" class="block pl-10 w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for guru">
                <button type="submit" class="absolute right-0 top-0 mt-2 mr-3 text-blue-600">Search</button>
            </div>
        </form>

        @if (session('success'))
            <div id="alert-success" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
                {{ session('success') }}
                <button onclick="document.getElementById('alert-success').style.display='none'" class="text-white ml-4">&times;</button>
            </div>
        @endif
        @if (session('update'))
            <div id="alert-update" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
                {{ session('update') }}
                <button onclick="document.getElementById('alert-update').style.display='none'" class="text-white ml-4">&times;</button>
            </div>
        @endif
        @if (session('delete'))
            <div id="alert-delete" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
                {{ session('delete') }}
                <button onclick="document.getElementById('alert-delete').style.display='none'" class="text-white ml-4">&times;</button>
            </div>
        @endif

        <!-- Tambahkan tombol New Guru -->
        <div class="mb-4">
            <a href="{{ route('guru.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                New Guru
            </a>
        </div>

        <table class="w-full max-w-6xl justify-center mx-auto text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg">
            <thead class="bg-gray-800 text-gray-200">
                <tr>
                    <th class="py-3 px-6">Nama</th>
                    <th class="py-3 px-6">Mapel</th>
                    <th class="py-3 px-6">Umur</th>
                    <th class="py-3 px-6">Foto</th>
                    <th class="py-3 px-6">Pendidikan Terakhir</th>
                    <th class="py-3 px-6">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guru as $guruItem)
                    <tr class="bg-gray-700 border-b border-gray-600">
                        <td class="py-4 px-6 text-white">{{ $guruItem->nama }}</td>
                        <td class="py-4 px-6 text-white">{{ $guruItem->mapel }}</td>
                        <td class="py-4 px-6 text-white">{{ $guruItem->umur }}</td>
                        <td class="py-4 px-6">
                            <img src="{{ asset('storage/' . $guruItem->foto) }}" alt="Foto Guru" class="w-20">
                        </td>
                        <td class="py-4 px-6 text-white">{{ $guruItem->pendidikan_terakhir }}</td>
                        <td class="py-4 px-6 flex items-center space-x-2">
                            <a href="{{ route('guru.edit', $guruItem->id_guru) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Edit</a>
                            <button type="button" onclick="showModal({{ $guruItem->id_guru }})" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Hapus</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div id="popup-modal-{{ $guruItem->id_guru }}" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                        <div class="relative p-4 w-full max-w-md mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="hideModal({{ $guruItem->id_guru }})">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>    
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this guru?</h3>
                                <form action="{{ route('guru.destroy', $guruItem->id_guru) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Yes, I'm sure
                                    </button>
                                </form>
                                <button onclick="hideModal({{ $guruItem->id_guru }})" type="button" class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-white">Tidak ada data guru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
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
