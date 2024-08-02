<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Paket; // Import model Paket
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Menampilkan daftar semua pembayaran.
     */
    public function index()
    {
        $payment = Payment::with('paket')->get(); // Mengambil semua pembayaran dengan relasi paket
        return view('payment.index', compact('payment'));
    }

    /**
     * Menampilkan formulir untuk membuat pembayaran baru.
     */
    public function create()
    {
        $pakets = Paket::all(); // Mengambil semua paket
        return view('payment.create', compact('pakets'));
    }

    /**
     * Menyimpan pembayaran yang baru dibuat ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'metode_pembayaran' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'bukti_transaksi' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'id_paket' => 'required|exists:paket,id_paket',
            'tanggal_transaksi' => 'required|date', // Tambahkan validasi tanggal transaksi
        ], [
            'metode_pembayaran.required' => 'Metode pembayaran wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'bukti_transaksi.required' => 'Bukti transaksi wajib diupload.',
            'bukti_transaksi.image' => 'Bukti transaksi harus berupa gambar.',
            'bukti_transaksi.mimes' => 'Gambar harus dalam format jpeg, png, atau jpg.',
            'bukti_transaksi.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'id_paket.required' => 'ID paket wajib diisi.',
            'id_paket.exists' => 'ID paket tidak ditemukan.',
            'tanggal_transaksi.required' => 'Tanggal transaksi wajib diisi.',
            'tanggal_transaksi.date' => 'Tanggal transaksi tidak valid.',
        ]);

        // Menyimpan gambar bukti transaksi
        if ($request->hasFile('bukti_transaksi')) {
            $file = $request->file('bukti_transaksi');
            $path = $file->store('images', 'public'); // Menyimpan di folder storage/app/public/images
            $validatedData['bukti_transaksi'] = $path;
        }

        // Membuat pembayaran baru
        Payment::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }


    /**
     * Menampilkan detail pembayaran tertentu.
     */
    public function show(Payment $payment)
    {
        // Menampilkan detail pembayaran
        return view('payment.show', compact('payment'));
    }

    /**
     * Menampilkan formulir untuk mengedit pembayaran yang sudah ada.
     */
    public function edit(Payment $payment)
    {
        $pakets = Paket::all(); // Mengambil semua paket
        return view('payment.edit', compact('payment', 'pakets'));
    }

    /**
     * Memperbarui pembayaran yang sudah ada di penyimpanan.
     */
    public function update(Request $request, Payment $payment)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'metode_pembayaran' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'bukti_transaksi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'id_paket' => 'required|exists:paket,id_paket',
            'tanggal_transaksi' => 'required|date', // Tambahkan validasi tanggal transaksi
        ], [
            'metode_pembayaran.required' => 'Metode pembayaran wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'bukti_transaksi.image' => 'Bukti transaksi harus berupa gambar.',
            'bukti_transaksi.mimes' => 'Gambar harus dalam format jpeg, png, atau jpg.',
            'bukti_transaksi.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'id_paket.required' => 'ID paket wajib diisi.',
            'id_paket.exists' => 'ID paket tidak ditemukan.',
            'tanggal_transaksi.required' => 'Tanggal transaksi wajib diisi.',
            'tanggal_transaksi.date' => 'Tanggal transaksi tidak valid.',
        ]);

        // Memperbarui gambar bukti transaksi jika ada file baru yang diupload
        if ($request->hasFile('bukti_transaksi')) {
            // Hapus gambar lama jika ada
            if ($payment->bukti_transaksi) {
                Storage::disk('public')->delete($payment->bukti_transaksi);
            }

            $file = $request->file('bukti_transaksi');
            $path = $file->store('images', 'public'); // Menyimpan di folder storage/app/public/images
            $validatedData['bukti_transaksi'] = $path;
        }

        // Memperbarui data pembayaran
        $payment->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('payment.index')->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    /**
     * Menghapus pembayaran dari penyimpanan.
     */
    public function destroy(Payment $payment)
    {
        // Hapus gambar bukti transaksi jika ada
        if ($payment->bukti_transaksi) {
            Storage::disk('public')->delete($payment->bukti_transaksi);
        }

        // Menghapus pembayaran
        $payment->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('payment.index')->with('success', 'Data pembayaran berhasil dihapus.');
    }
}
