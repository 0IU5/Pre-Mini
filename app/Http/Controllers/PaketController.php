<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Menampilkan daftar semua paket.
     */
    public function index()
    {
        // Mendapatkan semua paket
        $paket = Paket::all();
        return view('paket.index', compact('paket'));
    }

    /**
     * Menampilkan formulir untuk membuat paket baru.
     */
    public function create()
    {
        // Menampilkan formulir untuk membuat paket baru
        return view('paket.create');
    }

    /**
     * Menyimpan paket yang baru dibuat ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'paket' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0'
        ], [
            'paket.required' => 'Nama paket wajib diisi.',
            'paket.string' => 'Nama paket harus berupa string.',
            'paket.max' => 'Nama paket tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa string.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.'
        ]);

        // Membuat paket baru
        Paket::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail paket tertentu.
     */
    public function show(Paket $paket)
    {
        // Menampilkan detail paket
        return view('paket.show', compact('paket'));
    }

    /**
     * Menampilkan formulir untuk mengedit paket yang sudah ada.
     */
    public function edit(Paket $paket)
    {
        // Menampilkan formulir untuk mengedit data paket
        return view('paket.edit', compact('paket'));
    }

    /**
     * Memperbarui paket yang sudah ada di penyimpanan.
     */
    public function update(Request $request, Paket $paket)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'paket' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0'
        ], [
            'paket.required' => 'Nama paket wajib diisi.',
            'paket.string' => 'Nama paket harus berupa string.',
            'paket.max' => 'Nama paket tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa string.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.'
        ]);

        // Memperbarui data paket
        $paket->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('paket.index')->with('success', 'Data paket berhasil diperbarui.');
    }

    /**
     * Menghapus paket dari penyimpanan.
     */
    public function destroy(Paket $paket)
    {
        // Menghapus paket
        $paket->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('paket.index')->with('success', 'Data paket berhasil dihapus.');
    }
}
