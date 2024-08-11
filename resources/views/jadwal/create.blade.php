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
                        <label for="id_payment" class="block text-sm font-medium text-gray-700 dark:text-white">Nama Siswa dan Paket</label>
                        <select name="id_payment" id="id_payment" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="" disabled {{ old('id_payment') == '' ? 'selected' : '' }}>Pilih Nama Siswa dan Paket</option>
                            @foreach ($payment as $item)
                                <option value="{{ $item->id_payment }}" {{ old('id_payment') == $item->id_payment ? 'selected' : '' }}>{{ $item->nama }} - {{ $item->paket->paket }}</option>
                            @endforeach
                        </select>
                        @error('id_payment')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="id_guru" class="block text-sm font-medium text-gray-700 dark:text-white">Nama Guru dan Mapel</label>
                        <select name="id_guru" id="id_guru" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white {{ $errors->has('id_guru') ? 'border-red-600' : '' }}">
                            <option value="" disabled {{ old('id_guru') == '' ? 'selected' : '' }}>Pilih Nama Guru dan Mapel</option>
                            @foreach ($guru as $item)
                                <option value="{{ $item->id_guru }}" {{ old('id_guru') == $item->id_guru ? 'selected' : '' }}>{{ $item->nama }} - {{ $item->mapel->mapel }}</option>
                            @endforeach
                        </select>
                        @error('id_guru')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>                    

                    <div>
                        <label for="hari" class="block text-sm font-medium text-gray-700 dark:text-white">Hari</label>
                        <select name="hari" id="hari" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="" disabled {{ old('id_jadwal') == '' ? 'selected' : '' }}>Pilih Hari</option>
                            <option value="Senin" {{ old('hari', $jadwal->hari ?? '') == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ old('hari', $jadwal->hari ?? '') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ old('hari', $jadwal->hari ?? '') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ old('hari', $jadwal->hari ?? '') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ old('hari', $jadwal->hari ?? '') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ old('hari', $jadwal->hari ?? '') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            <option value="Minggu" {{ old('hari', $jadwal->hari ?? '') == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                        </select>
                        @error('hari')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>                    

                    <div>
                        <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-white">Waktu Mulai</label>
                        <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @error('start_time')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-white">Waktu Selesai</label>
                        <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
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
