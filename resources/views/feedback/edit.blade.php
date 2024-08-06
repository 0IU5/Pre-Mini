@extends('layouts.app')

@section('content')
<form class="max-w-sm mx-auto" action="{{ route('feedback.update', $feedback->id_feedback) }}" method="POST">
  @csrf
  @method('PUT')

  <!-- Nama -->
  <div class="mb-4">
    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
    <div class="flex">
      <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-100 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-700 dark:text-gray-400 dark:border-gray-600">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M1 8.5A7.5 7.5 0 1 1 8.5 1 7.5 7.5 0 0 1 1 8.5zm7.5-5A5.5 5.5 0 1 0 13 8.5 5.5 5.5 0 0 0 8.5 3.5zm-1 2h2v2H7.5V5.5z"/>
        </svg>
      </span>
      <input type="text" id="nama" name="nama" value="{{ old('nama', $feedback->nama) }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-r-md dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:placeholder-gray-400" placeholder="Masukkan nama" required>
    </div>
    @error('nama')
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
  </div>

  <!-- Email -->
  <div class="mb-4">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
    <div class="flex">
      <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-100 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-700 dark:text-gray-400 dark:border-gray-600">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2 4.5h12v7H2v-7zm0-1v-1.5h12V3.5h-12zM1 8.5v-4h14v4H1zm1 2.5h12v1H2v-1z"/>
        </svg>
      </span>
      <input type="email" id="email" name="email" value="{{ old('email', $feedback->email) }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-r-md dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:placeholder-gray-400" placeholder="Masukkan email" required>
    </div>
    @error('email')
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
  </div>

  <!-- Feedback -->
  <div class="mb-6">
    <label for="feedback" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feedback</label>
    <textarea id="feedback" name="feedback" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:placeholder-gray-400" placeholder="Masukkan feedback" required>{{ old('feedback', $feedback->feedback) }}</textarea>
    @error('feedback')
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
  </div>

  <button type="submit" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Feedback</button>
  <a href="{{ route('feedback.index') }}" class="ml-4 bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:ring-4 focus:ring-gray-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">Kembali</a>
</form>
@endsection
