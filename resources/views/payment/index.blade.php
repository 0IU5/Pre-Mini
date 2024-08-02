@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Daftar Pembayaran</h2>
        @if (session('success'))
            <div class="mb-4 text-green-500">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tambahkan tombol New Payment -->
        <div class="mb-4">
            <a href="{{ route('payment.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                New Payment
            </a>
        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">No HP</th>
                    <th scope="col" class="px-6 py-3">Paket</th>
                    <th scope="col" class="px-6 py-3">Total Pembayaran</th>
                    <th scope="col" class="px-6 py-3">Metode Pembayaran</th>
                    <th scope="col" class="px-6 py-3">Bukti Transaksi</th>
                    <th scope="col" class="px-6 py-3">Tanggal Transaksi</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $payment->nama }}</td>
                        <td class="px-6 py-4">{{ $payment->no_hp }}</td>
                        <td class="px-6 py-4">{{ $payment->paket->paket ?? '-' }}</td> 
                        <td class="px-6 py-4">
                            @if($payment->paket && $payment->paket->harga)
                                Rp {{ number_format($payment->paket->harga, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $payment->metode_pembayaran }}</td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $payment->bukti_transaksi) }}" alt="Bukti Transaksi" class="w-20">
                        </td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($payment->tanggal_transaksi)->format('d M Y H:i') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('payment.edit', $payment->id_payment) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>>
                            <form action="{{ route('payment.destroy', $payment->id_payment) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        
    </div>
</section>
@endsection
