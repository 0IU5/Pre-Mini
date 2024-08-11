@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="min-h-screen justify-center mx-auto max-w-5xl pt-12">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Guru Baru</h2>

        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nama" class="block text-gray-700 dark:text-gray-200">Nama Guru:</label>
                <input type="text" id="nama" name="nama" class="w-full p-2 rounded border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200" value="{{ old('nama') }}">
                @error('nama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="id_mapel" class="block text-gray-700 dark:text-gray-200">Mata Pelajaran:</label>
                <select id="id_mapel" name="id_mapel" class="w-full p-2 rounded border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200">
                    @foreach ($mapel as $item)
                        <option value="{{ $item->id_mapel }}" {{ old('id_mapel') == $item->id_mapel ? 'selected' : '' }}>
                            {{ $item->mapel }}
                        </option>
                    @endforeach
                </select>
                @error('id_mapel')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-4">
                <label for="umur" class="block text-gray-700 dark:text-gray-200">Umur:</label>
                <input type="number" id="umur" name="umur" class="w-full p-2 rounded border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200" value="{{ old('umur') }}">
                @error('umur')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-4">
                <label for="pendidikan_terakhir" class="block text-gray-700 dark:text-gray-200">Pendidikan Terakhir:</label>
                <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" class="w-full p-2 rounded border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200" value="{{ old('pendidikan_terakhir') }}">
                @error('pendidikan_terakhir')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-gray-700 dark:text-gray-200">Foto:</label>
                <input type="file" id="foto" name="foto" class="w-full p-2 rounded border border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-200">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                <a href="{{ route('guru.index') }}" class="ml-4 bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:ring-4 focus:ring-gray-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">Kembali</a>
            </div>
        </form>
    </div>
</section>
@endsection
