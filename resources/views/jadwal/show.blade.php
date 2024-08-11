@extends('layouts.app')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gradient-to-r from-gray-500 to-white-500">
    <div class="max-w-sm w-full bg-white p-6 rounded-lg shadow-lg dark:bg-gray-800 transform transition duration-500 hover:scale-105">
        <div class="p-6 bg-gray-100 dark:bg-gray-900 rounded-lg shadow-md text-center">

            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Jadwal Siswa Bimbel</h2>

            <p class="text-gray-700 dark:text-gray-300 font-semibold mb-2">
                Nama Guru: 
                @if ($jadwal->guru && is_object($jadwal->guru))
                    <span class="font-normal text-lg">{{ $jadwal->guru->nama ?? '-' }}</span>
                @else
                    <span class="font-normal text-lg">-</span>
                @endif
            </p>
            
            <p class="text-gray-700 dark:text-gray-300 font-semibold mb-2">
                Mapel: 
                @if ($jadwal->guru && $jadwal->guru->mapel && is_object($jadwal->guru->mapel))
                    <span class="font-normal text-lg">{{ $jadwal->guru->mapel->mapel ?? '-' }}</span>
                @else
                    <span class="font-normal text-lg">-</span>
                @endif
            </p>

            <p class="text-gray-700 dark:text-gray-300 font-semibold mb-2">
                Hari: 
                <span class="font-normal text-lg">{{ $jadwal->hari ?? '-' }}</span>
            </p>
            
            <p class="text-gray-700 dark:text-gray-300 font-semibold mb-2">
                Start: 
                <span class="font-normal text-lg">{{ \Carbon\Carbon::parse($jadwal->start_time)->format('h:i A') ?? '-' }}</span>
            </p>

            <p class="text-gray-700 dark:text-gray-300 font-semibold mb-4">
                End: 
                <span class="font-normal text-lg">{{ \Carbon\Carbon::parse($jadwal->end_time)->format('h:i A' ) ?? '-' }}</span>
            </p>

            <a href="{{ route('jadwal.index') }}">
                <button class="w-full py-2 bg-teal-600 text-white rounded-lg shadow-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-400">
                    Kembali
                </button>
            </a>

        </div>
    </div>
</section>
@endsection
