<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Paket;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\Payment;
use Carbon\Carbon;
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
        // Mendapatkan data untuk dropdown
        $paket = Paket::all();
        $mapel = Mapel::all();
        $guru = Guru::all(); // Ambil data guru dari tabel guru
        $payment = Payment::all(); // Ambil data payment dari tabel payment

        // Menampilkan formulir untuk membuat jadwal baru
        return view('jadwal.create', compact('paket', 'mapel', 'guru', 'payment'));
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
            'id_paket' => 'required|exists:paket,id_paket',
            'id_mapel' => 'required|exists:mapel,id_mapel',
            'id_guru' => 'required|exists:guru,id_guru',
            'id_payment' => 'required|exists:payment,id_payment',
        ], [
            'start_time.required' => 'Waktu mulai wajib diisi.',
            'end_time.required' => 'Waktu selesai wajib diisi.',
            'end_time.after' => 'Waktu selesai harus setelah waktu mulai.',
            'id_paket.required' => 'ID paket wajib diisi.',
            'id_paket.exists' => 'ID paket tidak ditemukan dalam tabel paket.',
            'id_mapel.required' => 'ID mata pelajaran wajib diisi.',
            'id_mapel.exists' => 'ID mata pelajaran tidak ditemukan dalam tabel mapel.',
            'id_guru.required' => 'ID guru wajib diisi.',
            'id_guru.exists' => 'ID guru tidak ditemukan dalam tabel guru.',
            'id_payment.required' => 'ID pembayaran wajib diisi.',
            'id_payment.exists' => 'ID pembayaran tidak ditemukan dalam tabel payment.',
        ]);

        // Mengonversi format datetime dari 'Y-m-d\TH:i' ke 'Y-m-d H:i:s'
        $validatedData['start_time'] = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['start_time'])->format('Y-m-d H:i:s');
        $validatedData['end_time'] = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['end_time'])->format('Y-m-d H:i:s');

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
        // Mendapatkan data untuk dropdown
        $paket = Paket::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        $payment = Payment::all();

        // Menampilkan formulir untuk mengedit data jadwal
        return view('jadwal.edit', compact('jadwal', 'paket', 'mapel', 'guru', 'payment'));
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
            'id_paket' => 'required|exists:paket,id_paket',
            'id_mapel' => 'required|exists:mapel,id_mapel',
            'id_guru' => 'required|exists:guru,id_guru',
            'id_payment' => 'required|exists:payment,id_payment',
        ], [
            'start_time.required' => 'Waktu mulai wajib diisi.',
            'end_time.required' => 'Waktu selesai wajib diisi.',
            'end_time.after' => 'Waktu selesai harus setelah waktu mulai.',
            'id_paket.required' => 'ID paket wajib diisi.',
            'id_paket.exists' => 'ID paket tidak ditemukan dalam tabel paket.',
            'id_mapel.required' => 'ID mata pelajaran wajib diisi.',
            'id_mapel.exists' => 'ID mata pelajaran tidak ditemukan dalam tabel mapel.',
            'id_guru.required' => 'ID guru wajib diisi.',
            'id_guru.exists' => 'ID guru tidak ditemukan dalam tabel guru.',
            'id_payment.required' => 'ID pembayaran wajib diisi.',
            'id_payment.exists' => 'ID pembayaran tidak ditemukan dalam tabel payment.',
        ]);

        // Mengonversi format datetime dari 'Y-m-d\TH:i' ke 'Y-m-d H:i:s'
        $validatedData['start_time'] = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['start_time'])->format('Y-m-d H:i:s');
        $validatedData['end_time'] = Carbon::createFromFormat('Y-m-d\TH:i', $validatedData['end_time'])->format('Y-m-d H:i:s');

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
