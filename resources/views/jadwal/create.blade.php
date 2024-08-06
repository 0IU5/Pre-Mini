@extends('layouts.app')

@section('content')
<section class="bg-gray-600">
    <div class="py-8 px-4 mx-auto max-w-7xl lg:py-16">
        <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Buat Jadwal Baru</h2>

            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="id_guru" class="block text-sm font-medium text-gray-700 dark:text-white">Nama Guru</label>
                        <select name="id_guru" id="id_guru" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @foreach ($guru as $item)
                                <option value="{{ $item->id_guru }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_guru')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="id_payment" class="block text-sm font-medium text-gray-700 dark:text-white">Nama Pembayaran</label>
                        <select name="id_payment" id="id_payment" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @foreach ($payment as $item)
                                <option value="{{ $item->id_payment }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_payment')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="id_paket" class="block text-sm font-medium text-gray-700 dark:text-white">Paket</label>
                        <select name="id_paket" id="id_paket" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @foreach ($paket as $item)
                                <option value="{{ $item->id_paket }}">{{ $item->paket }}</option>
                            @endforeach
                        </select>
                        @error('id_paket')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="id_mapel" class="block text-sm font-medium text-gray-700 dark:text-white">Mata Pelajaran</label>
                        <select name="id_mapel" id="id_mapel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @foreach ($mapel as $item)
                                <option value="{{ $item->id_mapel }}">{{ $item->mapel }}</option>
                            @endforeach
                        </select>
                        @error('id_mapel')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-white">Waktu Mulai</label>
                        <input type="datetime-local" name="start_time" id="start_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @error('start_time')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-white">Waktu Selesai</label>
                        <input type="datetime-local" name="end_time" id="end_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @error('end_time')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Simpan</button>
                    <a href="{{ route('jadwal.index') }}" class="ml-4 bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:ring-4 focus:ring-gray-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
