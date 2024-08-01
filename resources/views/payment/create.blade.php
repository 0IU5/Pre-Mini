@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Pembayaran Baru</h2>
        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User ID</label>
                    <input type="text" name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan ID pengguna" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="id_paket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Paket</label>
                    <input type="text" name="id_paket" id="id_paket" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan ID paket" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="metode_pembayaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metode Pembayaran</label>
                    <select name="metode_pembayaran" id="metode_pembayaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        <option value="" disabled selected>Pilih metode pembayaran</option>
                        <option value="Kartu Kredit">Kartu Kredit</option>
                        <option value="Kartu Debit">Kartu Debit</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="OVO">OVO</option>
                        <option value="GoPay">GoPay</option>
                        <option value="DANA">DANA</option>
                        <option value="LinkAja">LinkAja</option>
                        <option value="ShopeePay">ShopeePay</option>
                        <option value="Mobile Banking">Mobile Banking</option>
                        <option value="Internet Banking">Internet Banking</option>
                        <option value="QR Code Payment">QR Code Payment</option>
                        <option value="Virtual Account">Virtual Account</option>
                        <option value="Flazz">Flazz</option>
                        <option value="e-Money">e-Money</option>
                        <option value="Brizzi">Brizzi</option>
                        <option value="TapCash">TapCash</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Cryptocurrency">Cryptocurrency</option>
                        <option value="Direct Debit">Direct Debit</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="bukti_transaksi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bukti Transaksi</label>
                    <input type="file" name="bukti_transaksi" id="bukti_transaksi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Tambah Pembayaran
            </button>
        </form>
    </div>
</section>
@endsection