@extends('layouts.app')

@section('content')
<section class="bg-gray-600">
    <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
        <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Tambah Mata Pelajaran Baru</h2>

            <form action="{{ route('mapel.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="mapel" class="block text-sm font-medium text-gray-700 dark:text-white">Mata Pelajaran</label>
                        <input type="text" name="mapel" id="mapel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{ old('mapel') }}">
                        @error('mapel')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-white">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Simpan</button>
                        <a href="{{ route('mapel.index') }}" class="ml-4 bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-700">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
