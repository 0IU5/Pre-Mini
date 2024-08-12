<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Menampilkan daftar semua mata pelajaran.
     */
    public function index()
    {
        // Mendapatkan semua mata pelajaran
        $mapel = Mapel::all();
        return view('mapel.index', compact('mapel'));
    }

    /**
     * Menampilkan formulir untuk membuat mata pelajaran baru.
     */
    public function create()
    {
        // Menampilkan formulir untuk membuat mata pelajaran baru
        return view('mapel.create');
    }

    /**
     * Menyimpan mata pelajaran yang baru dibuat ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'mapel' => 'required|string|max:255',
            'deskripsi' => 'required|string'
        ], [
            'mapel.required' => 'Kolom wajib diisi.',
            'mapel.string' => 'Kolom harus berupa string.',
            'mapel.max' => 'Mapel tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Kolom wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa string.',
        ]);

        // Membuat mata pelajaran baru
        Mapel::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('mapel.index')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail mata pelajaran tertentu.
     */
    public function show(Mapel $mapel)
    {
        // Menampilkan detail mata pelajaran
        return view('mapel.show', compact('mapel'));
    }

    /**
     * Menampilkan formulir untuk mengedit mata pelajaran yang sudah ada.
     */
    public function edit(Mapel $mapel)
    {
        // Menampilkan formulir untuk mengedit data mata pelajaran
        return view('mapel.edit', compact('mapel'));
    }

    /**
     * Memperbarui mata pelajaran yang sudah ada di penyimpanan.
     */
    public function update(Request $request, Mapel $mapel)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'mapel' => 'required|string|max:255',
            'deskripsi' => 'required|string'
        ], [
            'mapel.required' => 'Kolom wajib diisi.',
            'mapel.string' => 'Kolom harus berupa string.',
            'mapel.max' => 'Kolom tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Kolom wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa string.',
        ]);

        // Memperbarui data mata pelajaran
        $mapel->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('mapel.index')->with('success', 'Data mata pelajaran berhasil diperbarui.');
    }

    /**
     * Menghapus mata pelajaran dari penyimpanan.
     */
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        
        // Cek apakah ada jadwal yang terkait dengan mata pelajaran ini
        if ($mapel->jadwal()->exists()) {
            return redirect()->route('mapel.index')->with('error', 'Mata pelajaran ini sedang digunakan dalam jadwal dan tidak dapat dihapus.');
        }

        $mapel->delete();
        return redirect()->route('mapel.index')->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
