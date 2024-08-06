@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-28">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Paket Baru</h2>

        @if($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('paket.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="paket" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nama Paket</label>
                <input type="text" id="paket" name="paket" value="{{ old('paket') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300" required>{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ old('harga') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300" required>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Simpan
                </button>
                <a href="{{ route('paket.index') }}" class="ml-4 bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:ring-4 focus:ring-gray-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">Kembali</a>
            </div>
        </form>
    </div>
</section>
@endsection
