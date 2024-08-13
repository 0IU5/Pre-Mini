@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900 min-h-screen py-12">
    <div class="mx-auto max-w-6xl">
        <h2 class="mb-6 text-3xl font-bold text-gray-900 dark:text-white">Daftar Guru Bimble</h2>

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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($guru as $guruItem)
                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img alt="Foto Guru" class="w-24 h-24 rounded-full object-cover mr-4" src="{{ asset('storage/' . $guruItem->foto) }}">
                            <div>
                                <h2 class="text-xl font-bold text-gray-800 dark:text-white">{{ $guruItem->nama }}</h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Guru {{ $guruItem->mapel->mapel }}</p>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <p class="text-gray-700 dark:text-gray-300"><span class="font-semibold">Umur:</span> {{ $guruItem->umur }} tahun</p>
                            <p class="text-gray-700 dark:text-gray-300"><span class="font-semibold">Pendidikan:</span> {{ $guruItem->pendidikan_terakhir }}</p>
                            <p class="text-gray-700 dark:text-gray-300"><span class="font-semibold">Mata Pelajaran:</span> {{ $guruItem->mapel->mapel }}</p>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 flex justify-between items-center">
                        <a href="{{ route('guru.edit', $guruItem->id_guru) }}" class="px-4 py-2 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600">Edit Profil</a>
                        <form action="{{ route('guru.destroy', $guruItem->id_guru) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus profil ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600">Hapus Profil</button>
                        </form>
                    </div>
                </div>

                <!-- Modal for delete confirmation (unchanged) -->
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
    // JavaScript functions (unchanged)
</script>
@endsection