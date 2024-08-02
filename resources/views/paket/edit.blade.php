@extends('layouts.app')

@section('content')
<div class="container px-5 py-24 mx-auto bg-white">
    @if($errors->any())
    <div class="alert alert-danger bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h2 class="text-2xl font-bold mb-6">Edit Paket</h2>
    <form action="{{ route('paket.update', $paket->id_paket) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="paket" class="block text-gray-700">Nama Paket:</label>
            <input type="text" id="paket" name="paket" class="mt-1 block w-full" value="{{ $paket->paket }}" required>
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" class="mt-1 block w-full" required>{{ $paket->deskripsi }}</textarea>
        </div>
        <div class="mb-4">
            <label for="harga" class="block text-gray-700">Harga:</label>
            <input type="number" id="harga" name="harga" class="mt-1 block w-full" value="{{ $paket->harga }}" required>
        </div>
        <div>
            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
