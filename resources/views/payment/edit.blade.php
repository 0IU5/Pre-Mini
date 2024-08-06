@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Pembayaran</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payment.update', $payment->id_payment) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $payment->nama) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300" required>
            </div>

            <div class="mb-4">
                <label for="no_hp" class="block text-sm font-medium text-gray-700 dark:text-gray-400">No HP</label>
                <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $payment->no_hp) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300" required>
            </div>

            <div class="mb-4">
                <label for="id_paket" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Paket</label>
                <select name="id_paket" id="id_paket" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300" required>
                    <option value="" disabled>Pilih Paket</option>
                    @foreach ($pakets as $paket)
                        <option value="{{ $paket->id_paket }}" {{ $paket->id_paket == old('id_paket', $payment->id_paket) ? 'selected' : '' }}>{{ $paket->paket }} - {{ $paket->harga }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Metode Pembayaran</label>
                <select name="metode_pembayaran" id="metode_pembayaran" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300" required>
                    <option value="" disabled {{ old('metode_pembayaran') == '' ? 'selected' : '' }}>Pilih Metode Pembayaran</option>
                    <option value="transfer" {{ old('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                    <option value="tunai" {{ old('metode_pembayaran') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                    <option value="dana" {{ old('metode_pembayaran') == 'dana' ? 'selected' : '' }}>Dana</option>
                </select>
            </div>     

            <div class="mb-4">
                <label for="bukti_transaksi" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Bukti Transaksi</label>
                @if($payment->bukti_transaksi)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $payment->bukti_transaksi) }}" alt="Bukti Transaksi" class="w-20">
                    </div>
                @endif
                <input type="file" name="bukti_transaksi" id="bukti_transaksi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">
            </div>

            <div class="mb-4">
                <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Tanggal Transaksi</label>
                <input type="datetime-local" name="tanggal_transaksi" id="tanggal_transaksi" value="{{ old('tanggal_transaksi', \Carbon\Carbon::parse($payment->tanggal_transaksi)->format('Y-m-d\TH:i')) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300" required>
            </div>                        

            <div class="flex items-center justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
