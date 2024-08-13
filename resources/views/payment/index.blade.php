@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="min-h-screen mx-auto max-w-5xl pt-12">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Daftar Pembayaran</h2>

        <div class="flex justify-end">
            <form method="GET" action="{{ route('payment.index') }}">
                <input type="text" name="search" placeholder="Search Nama" value="{{ $search ?? '' }}" class="px-4 py-2 border rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Cari
                </button>
            </form>
        </div>      

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
        @if (session('error'))
            <div id="alert-error" class="bg-red-700 text-white py-2 px-4 mb-4 rounded flex justify-between items-center">
                {{ session('error') }}
                <button onclick="document.getElementById('alert-error').style.display='none'" class="text-white ml-4">&times;</button>
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('payment.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                New Payment
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg border border-gray-200 dark:border-gray-700 whitespace-nowrap">
                <thead class="bg-gray-800 text-gray-200">
                    <tr>
                        <th class="py-3 px-6">Nama</th>
                        <th class="py-3 px-6">No HP</th>
                        <th class="py-3 px-6">Paket</th>
                        <th class="py-3 px-6">Total Pembayaran</th>
                        <th class="py-3 px-6">Metode Pembayaran</th>
                        <th class="py-3 px-6">Bukti Transaksi</th>
                        <th class="py-3 px-6">Tanggal Transaksi</th>
                        <th class="py-3 px-6">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr class="bg-gray-700 border-b border-gray-600">
                            <td class="py-4 px-6 text-sm font-medium text-white">{{ $payment->nama }}</td>
                            <td class="py-4 px-6 text-sm font-medium text-white">{{ $payment->no_hp }}</td>
                            <td class="py-4 px-6 text-sm font-medium text-white">{{ $payment->paket->paket ?? '-' }}</td> 
                            <td class="py-4 px-6 text-sm font-medium text-white">
                                @if($payment->paket && $payment->paket->harga)
                                    Rp {{ number_format($payment->paket->harga, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-white">{{ ucfirst($payment->metode_pembayaran) }}</td> <!-- Huruf depan menjadi besar -->
                            <td class="py-4 px-6">
                                @if($payment->bukti_transaksi)
                                    <img src="{{ asset('storage/' . $payment->bukti_transaksi) }}" alt="Bukti Transaksi" class="w-20">
                                @else
                                    -
                                @endif
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-white">{{ \Carbon\Carbon::parse($payment->tanggal_transaksi)->format('d M Y h:i A') }}</td>
                            <td class="py-4 px-6 flex space-x-2">
                                <a href="{{ route('payment.edit', $payment->id_payment) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Edit</a>
                                <button type="button" onclick="showModal({{ $payment->id_payment }})" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Hapus</button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div id="popup-modal-{{ $payment->id_payment }}" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                            <div class="relative p-4 w-full max-w-md mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="hideModal({{ $payment->id_payment }})">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>    
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this payment?</h3>
                                    <form action="{{ route('payment.destroy', $payment->id_payment) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Yes, I'm sure
                                        </button>
                                    </form>
                                    <button onclick="hideModal({{ $payment->id_payment }})" type="button" class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-3 text-center text-white">Data tidak ada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $payments->appends(['search' => request()->input('search')])->links() }}
            </div>
        </div>
    </div>
</section>

<script>
    function showModal(paymentId) {
        document.getElementById('popup-modal-' + paymentId).classList.remove('hidden');
    }

    function hideModal(paymentId) {
        document.getElementById('popup-modal-' + paymentId).classList.add('hidden');
    }
</script>
@endsection
