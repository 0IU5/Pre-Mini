@extends('layouts.app')

@section('content')
<section class="bg-gray-600">
    <div class="py-8 px-4 mx-auto max-w-6xl lg:py-20">
        <div class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 text-center">Detail Jadwal Paket</h2>
            
            <!-- Tambah Jadwal Paket Button and Alerts -->
            <div class="flex justify-between items-center mb-6">
                <a href="{{ route('jaket.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 mr-4">
                    Tambah Jadwal Paket
                </a>
                <a href="{{ route('jadwal.index') }}" class="bg-green-700 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:ring-4 focus:ring-green-300 dark:bg-green-700 dark:hover:bg-green-600 dark:focus:ring-green-800">
                    Lihat Jadwal Siswa
                </a>
            </div>
            
            @if (session('success'))
                <div id="alert-success" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
                    <strong class="font-bold">Sukses!</strong>
                    <span>{{ session('success') }}</span>
                    <button onclick="document.getElementById('alert-success').style.display='none'" class="text-white ml-4">&times;</button>
                </div>
            @endif
            @if (session('update'))
                <div id="alert-update" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
                    <strong class="font-bold">Diperbarui!</strong>
                    <span>{{ session('update') }}</span>
                    <button onclick="document.getElementById('alert-update').style.display='none'" class="text-white ml-4">&times;</button>
                </div>
            @endif
            @if (session('delete'))
                <div id="alert-delete" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
                    <strong class="font-bold">Dihapus!</strong>
                    <span>{{ session('delete') }}</span>
                    <button onclick="document.getElementById('alert-delete').style.display='none'" class="text-white ml-4">&times;</button>
                </div>
            @endif
            
            <div class="relative overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200 dark:border-gray-700">Paket</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200 dark:border-gray-700">Hari</th>    
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200 dark:border-gray-700">Aksi</th>    
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach ($jaket as $jaket)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white text-center">{{ $jaket->paket->paket }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white text-center">{{ $jaket->hari }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white text-center">
                                <a href="{{ route('jaket.edit', $jaket->id_jaket) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">Edit</a> 
                                <form action="{{ route('jaket.destroy', $jaket->id_jaket) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Button placed at the bottom-right corner -->
                <div class="flex justify-end mt-4">
                    <a href="{{ route('paket.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:ring-4 focus:ring-gray-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
