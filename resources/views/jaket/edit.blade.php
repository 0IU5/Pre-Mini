@extends('layouts.app')

@section('content')
<section class="bg-gray-600">
    <div class="py-8 px-4 mx-auto max-w-5xl lg:py-16">
        <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 text-center">Edit Jaket</h2>
            
            <form action="{{ route('jaket.update', $jaket->id_jaket) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="hari" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Hari</label>
                    <input type="text" name="hari" id="hari" value="{{ $jaket->hari }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600">
                    @error('hari')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="id_paket" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Paket</label>
                    <select name="id_paket" id="id_paket" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600">
                        
                        @foreach($paket as $paket)
                            <option value="{{ $paket->id_paket }}" {{ $jaket->id_paket == $paket->id_paket ? 'selected' : '' }}>{{ $paket->paket }}</option>
                        @endforeach
                    </select>
                    @error('id_paket')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Update</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
