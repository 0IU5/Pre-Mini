<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan daftar semua jadwal
        $jadwal = Jadwal::all();
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan formulir untuk membuat jadwal baru
        return view('jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'id' => 'required|exists:users,id',
            'id_paket' => 'required|exists:paket,id_paket',
            'id_mapel' => 'required|exists:mapel,id_mapel'
        ], [
            'start_time.required' => 'Waktu mulai wajib diisi.',
            'end_time.required' => 'Waktu selesai wajib diisi.',
            'end_time.after' => 'Waktu selesai harus setelah waktu mulai.',
            'id.required' => 'ID pengguna wajib diisi.',
            'id.exists' => 'ID pengguna tidak ditemukan dalam tabel users.',
            'id_paket.required' => 'ID paket wajib diisi.',
            'id_paket.exists' => 'ID paket tidak ditemukan dalam tabel paket.',
            'id_mapel.required' => 'ID mata pelajaran wajib diisi.',
            'id_mapel.exists' => 'ID mata pelajaran tidak ditemukan dalam tabel mapel.'
        ]);

        // Membuat jadwal baru
        Jadwal::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        // Menampilkan detail jadwal tertentu
        return view('jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        // Menampilkan formulir untuk mengedit data jadwal
        return view('jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'id' => 'required|exists:users,id',
            'id_paket' => 'required|exists:paket,id_paket',
            'id_mapel' => 'required|exists:mapel,id_mapel'
        ], [
            'start_time.required' => 'Waktu mulai wajib diisi.',
            'end_time.required' => 'Waktu selesai wajib diisi.',
            'end_time.after' => 'Waktu selesai harus setelah waktu mulai.',
            'id.required' => 'ID pengguna wajib diisi.',
            'id.exists' => 'ID pengguna tidak ditemukan dalam tabel users.',
            'id_paket.required' => 'ID paket wajib diisi.',
            'id_paket.exists' => 'ID paket tidak ditemukan dalam tabel paket.',
            'id_mapel.required' => 'ID mata pelajaran wajib diisi.',
            'id_mapel.exists' => 'ID mata pelajaran tidak ditemukan dalam tabel mapel.'
        ]);

        // Memperbarui data jadwal
        $jadwal->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        // Menghapus data jadwal
        $jadwal->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil dihapus.');
    }
}
