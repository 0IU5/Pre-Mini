<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
     * Menampilkan detail paket tertentu.
     */
    public function show($id)
    {
        // Mendapatkan paket berdasarkan ID
        $paket = Paket::findOrFail($id);

        // Menampilkan detail paket
        return view('paket.show', compact('paket'));
    }

    /**
     * Menyimpan paket yang baru dibuat ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'paket' => 'required|string|max:255|unique:paket,paket',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0'
        ], [
            'paket.required' => 'Nama paket wajib diisi!',
            'paket.string' => 'Nama paket harus berupa string!',
            'paket.max' => 'Nama paket tidak boleh lebih dari 255 karakter!',
            'paket.unique' => 'Paket sudah ada!',
            'deskripsi.required' => 'Deskripsi wajib diisi!',
            'deskripsi.string' => 'Deskripsi harus berupa string!',
            'harga.required' => 'Harga wajib diisi!',
            'harga.numeric' => 'Harga harus berupa angka!',
            'harga.min' => 'Harga tidak boleh kurang dari 0!'
        ]);

        // Buat paket baru
        Paket::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    /**
     * Menampilkan formulir untuk mengedit paket tertentu.
     */
    public function edit($id)
    {
        // Mendapatkan paket berdasarkan ID
        $paket = Paket::findOrFail($id);

        // Menampilkan formulir untuk mengedit paket
        return view('paket.edit', compact('paket'));
    }

    /**
     * Memperbarui paket yang ditentukan dalam penyimpanan.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dengan pengecualian ID yang sedang diperbarui
        $validatedData = $request->validate([
            'paket' => [
                'required',
                'string',
                'max:255',
                Rule::unique('paket', 'paket')->ignore($id, 'id_paket') // Menambahkan pengecualian untuk ID yang sedang diperbarui
            ],
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0'
        ], [
            'paket.required' => 'Nama paket wajib diisi!',
            'paket.string' => 'Nama paket harus berupa string!',
            'paket.max' => 'Nama paket tidak boleh lebih dari 255 karakter!',
            'paket.unique' => 'Paket sudah ada!',
            'deskripsi.required' => 'Deskripsi wajib diisi!',
            'deskripsi.string' => 'Deskripsi harus berupa string!',
            'harga.required' => 'Harga wajib diisi!',
            'harga.numeric' => 'Harga harus berupa angka!',
            'harga.min' => 'Harga tidak boleh kurang dari 0!'
        ]);

        // Mendapatkan paket berdasarkan ID
        $paket = Paket::findOrFail($id);

        // Memperbarui paket dengan data yang telah divalidasi
        $paket->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('paket.index')->with('update', 'Paket berhasil diperbarui!');
    }

    /**
     * Menghapus paket yang ditentukan dari penyimpanan.
     */
    public function destroy($id)
    {
        // Mendapatkan paket berdasarkan ID
        $paket = Paket::findOrFail($id);

        // Mengecek apakah paket sedang digunakan dalam relasi dengan Payment, Jadwal, atau Jaket
        if ($paket->payment()->exists() || $paket->jadwal()->exists() || $paket->jaket()->exists()) {
            // Redirect dengan pesan error jika paket sedang digunakan
            return redirect()->route('paket.index')->with('error', 'Paket tidak dapat dihapus karena sedang digunakan!');
        }

        // Menghapus paket
        $paket->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('paket.index')->with('delete', 'Paket berhasil dihapus!');
    }
}
