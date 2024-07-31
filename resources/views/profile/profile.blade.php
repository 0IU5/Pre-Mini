@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center relative mt-10">       
    <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update') }}" class="w-full max-w-md p-8 rounded-lg shadow-lg bg-gray-800 text-white">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-center">Profile Setting</h1>
        </div>

        @if (session('success'))
            <div class="mb-4 text-green-500">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <span class="text-base label-text">Username</span>
            <label class="input input-bordered flex items-center gap-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    class="h-4 w-4 opacity-70">
                    <path
                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                </svg>
                <input name="name" type="text" value="{{ auth()->user()->name }}" class="w-full bg-gray-700 border-gray-600 text-white @error('name') @enderror" />
                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </label>
        </div>
        <div class="mb-4">
            <span class="text-base label-text">Email</span>
            <label class="input input-bordered flex items-center gap-2">
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 16 16"
                        fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path
                        d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                        <path
                        d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                    </svg>
                <input name="email" type="text" value="{{ auth()->user()->email }}" class="w-full bg-gray-700 border-gray-600 text-white @error('email') @enderror" />
                @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </label>
        </div>
        <div class="mt-6">
            <button type="submit" class="btn btn-block bg-blue-500 hover:bg-blue-700 text-white">Save Profile</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('form').addEventListener('submit', function () {
            alert('Profile updated successfully!');
        });
    });
</script>
@endsection
