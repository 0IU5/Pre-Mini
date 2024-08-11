@extends('layouts.app')

@section('content')
<section class="bg-gray-600">
    <div class="py-8 px-4 mx-auto max-w-5xl lg:py-16">
        <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Daftar Mata Pelajaran</h2>
                <a href="{{ route('mapel.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Tambah Mata Pelajaran</a>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 text-green-800 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-300" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
            <div class="mb-4 p-4 text-red-800 bg-red-100 rounded-lg dark:bg-red-900 dark:text-red-300" role="alert">
                {{ session('error') }}
            </div>
        @endif

            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mata Pelajaran</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach ($mapel as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $item->mapel }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $item->deskripsi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('mapel.edit', $item->id_mapel) }}" class="ml-4 text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">Edit</a>
                                <form action="{{ route('mapel.destroy', $item->id_mapel) }}" method="POST" class="inline ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
