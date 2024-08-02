<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data guru
        $guru = Guru::all();
        return view('guru.index', compact('guru')); // Tampilkan data di view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan formulir untuk membuat data guru baru
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'umur' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pendidikan_terakhir' => 'required|string|max:255',
        ],[
            'nama.required' => 'Nama guru wajib diisi',
            'mapel.required' => 'Mata pelajaran wajib diisi',
            'umur.required' => 'Umur wajib diisi',
            'umur.integer' => 'Umur harus berupa angka',
            'foto.image' => 'Foto harus berupa gambar',
            'pendidikan_terakhir.required' => 'Pendidikan terakhir wajib diisi',
        ]);

        // Menyimpan foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('images', 'public');
            $validatedData['foto'] = $path;
        }

        // Menyimpan data guru ke database
        Guru::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        // Menampilkan detail guru tertentu
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        // Menampilkan formulir untuk mengedit data guru
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'umur' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pendidikan_terakhir' => 'required|string|max:255',
        ],[
            'nama.required' => 'Nama guru wajib diisi',
            'mapel.required' => 'Mata pelajaran wajib diisi',
            'umur.required' => 'Umur wajib diisi',
            'umur.integer' => 'Umur harus berupa angka',
            'foto.image' => 'Foto harus berupa gambar',
            'pendidikan_terakhir.required' => 'Pendidikan terakhir wajib diisi',
        ]);

        // Menyimpan foto jika ada file baru yang diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }

            $file = $request->file('foto');
            $path = $file->store('images', 'public');
            $validatedData['foto'] = $path;
        }

        // Memperbarui data guru
        $guru->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        // Hapus foto jika ada
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        // Menghapus data guru
        $guru->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
