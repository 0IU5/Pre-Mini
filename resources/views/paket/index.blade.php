@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-4">
    @if (session('success'))
        <div id="alert-success" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
            {{ session('success') }}
            <button onclick="document.getElementById('alert-success').style.display='none'" class="text-white ml-4">&times;</button>
        </div>
    @endif
    @if (session('update'))
        <div id="alert-update" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
            {{ session('update') }}
            <button onclick="document.getElementById('alert-update').style.display='none'" class="text-white ml-4">&times;</button>
        </div>
    @endif
    @if (session('delete'))
        <div id="alert-delete" class="bg-green-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
            {{ session('delete') }}
            <button onclick="document.getElementById('alert-delete').style.display='none'" class="text-white ml-4">&times;</button>
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold justify-center mx-auto">Paket BIMBEL</h1>
        <a href="{{ route('paket.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Paket</a>
    </div>
    
    <table class="w-full max-w-4xl justify-center mx-auto text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg">
    <thead class="bg-gray-800 text-gray-200">
        <tr>
            <th class="py-3 px-6">Nama Paket</th>
            <th class="py-3 px-6">Deskripsi</th>
            <th class="py-3 px-6">Harga</th>
            <th class="py-3 px-6">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($paket as $p)
            <tr class="bg-gray-700 border-b border-gray-600">
                <td class="py-4 px-6 text-white">{{ $p->paket }}</td>
                <td class="py-4 px-6 text-white">{{ $p->deskripsi }}</td>
                <td class="py-4 px-6 text-lg text-white" data-harga="{{ $p->harga }}">{{ number_format($p->harga, 2) }}</td>
                <td class="py-4 px-6 flex items-center space-x-2">
                    <a href="{{ route('paket.edit', $p->id_paket) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Edit</a>
                    <button type="button" onclick="showModal({{ $p->id_paket }})" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Hapus</button>
                </td>
            </tr>

            <!-- Modal -->
            <div id="popup-modal-{{ $p->id_paket }}" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                <div class="relative p-4 w-full max-w-md mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="hideModal({{ $p->id_paket }})">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>    
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this paket?</h3>
                        <form action="{{ route('paket.destroy', $p->id_paket) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                        </form>
                        <button onclick="hideModal({{ $p->id_paket }})" type="button" class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                    </div>
                </div>
            </div>
        @empty
            <tr>
                <td colspan="4" class="px-4 py-3 text-center text-white">Tidak ada data paket.</td>
            </tr>
        @endforelse
    </tbody>
</table>

    </div>
</div>

<script>
    function showModal(serviceId) {
        document.getElementById('popup-modal-' + serviceId).classList.remove('hidden');
    }

    function hideModal(serviceId) {
        document.getElementById('popup-modal-' + serviceId).classList.add('hidden');
    }

    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number).replace('IDR', '').trim();
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('td[data-harga]').forEach(function(element) {
            const harga = parseFloat(element.dataset.harga);
            if (!isNaN(harga)) {
                element.textContent = formatRupiah(harga);
            } else {
                element.textContent = 'Harga tidak tersedia';
            }
        });
    });
</script>
@endsection
