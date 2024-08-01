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
        <form action="{{ route('payment.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User ID</label>
                    <input type="text" name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('id', $payment->id) }}" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="id_paket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Paket</label>
                    <input type="text" name="id_paket" id="id_paket" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('id_paket', $payment->id_paket) }}" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="metode_pembayaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metode Pembayaran</label>
                    <select name="metode_pembayaran" id="metode_pembayaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        <option value="" disabled>Pilih metode pembayaran</option>
                        <option value="Kartu Kredit" {{ $payment->metode_pembayaran == 'Kartu Kredit' ? 'selected' : '' }}>Kartu Kredit</option>
                        <option value="Kartu Debit" {{ $payment->metode_pembayaran == 'Kartu Debit' ? 'selected' : '' }}>Kartu Debit</option>
                        <option value="Transfer Bank" {{ $payment->metode_pembayaran == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                        <option value="OVO" {{ $payment->metode_pembayaran == 'OVO' ? 'selected' : '' }}>OVO</option>
                        <option value="GoPay" {{ $payment->metode_pembayaran == 'GoPay' ? 'selected' : '' }}>GoPay</option>
                        <option value="DANA" {{ $payment->metode_pembayaran == 'DANA' ? 'selected' : '' }}>DANA</option>
                        <option value="LinkAja" {{ $payment->metode_pembayaran == 'LinkAja' ? 'selected' : '' }}>LinkAja</option>
                        <option value="ShopeePay" {{ $payment->metode_pembayaran == 'ShopeePay' ? 'selected' : '' }}>ShopeePay</option>
                        <option value="Mobile Banking" {{ $payment->metode_pembayaran == 'Mobile Banking' ? 'selected' : '' }}>Mobile Banking</option>
                        <option value="Internet Banking" {{ $payment->metode_pembayaran == 'Internet Banking' ? 'selected' : '' }}>Internet Banking</option>
                        <option value="QR Code Payment" {{ $payment->metode_pembayaran == 'QR Code Payment' ? 'selected' : '' }}>QR Code Payment</option>
                        <option value="Virtual Account" {{ $payment->metode_pembayaran == 'Virtual Account' ? 'selected' : '' }}>Virtual Account</option>
                        <option value="Flazz" {{ $payment->metode_pembayaran == 'Flazz' ? 'selected' : '' }}>Flazz</option>
                        <option value="e-Money" {{ $payment->metode_pembayaran == 'e-Money' ? 'selected' : '' }}>e-Money</option>
                        <option value="Brizzi" {{ $payment->metode_pembayaran == 'Brizzi' ? 'selected' : '' }}>Brizzi</option>
                        <option value="TapCash" {{ $payment->metode_pembayaran == 'TapCash' ? 'selected' : '' }}>TapCash</option>
                        <option value="PayPal" {{ $payment->metode_pembayaran == 'PayPal' ? 'selected' : '' }}>PayPal</option>
                        <option value="Cryptocurrency" {{ $payment->metode_pembayaran == 'Cryptocurrency' ? 'selected' : '' }}>Cryptocurrency</option>
                        <option value="Direct Debit" {{ $payment->metode_pembayaran == 'Direct Debit' ? 'selected' : '' }}>Direct Debit</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="bukti_transaksi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bukti Transaksi</label>
                    <input type="file" name="bukti_transaksi" id="bukti_transaksi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    @if ($payment->bukti_transaksi)
                        <img src="{{ asset('storage/' . $payment->bukti_transaksi) }}" alt="Bukti Transaksi" class="w-20 mt-2">
                    @endif
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Update Pembayaran
            </button>
        </form>
    </div>
</section>
@endsection
