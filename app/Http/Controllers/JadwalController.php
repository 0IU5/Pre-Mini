<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Paket;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\Payment;
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
            'hari' => 'required',
            'start_time' => 'required|after_or_equal:08:00|before_or_equal:21:00',
            'end_time' => 'required|after:start_time|before_or_equal:21:00',
            'id_guru' => 'required|exists:guru,id_guru',
            'id_payment' => 'required|exists:payment,id_payment',
        ], [
            'hari.required' => 'Kolom wajib diisi!',
            'start_time.required' => 'Kolom wajib diisi!',
            'start_time.after_or_equal' => 'Bimble buka pukul 08:00 AM!',
            'start_time.before_or_equal' => 'Waktu mulai harus sebelum atau sama dengan 21:00!',
            'end_time.required' => 'Kolom wajib diisi!',
            'end_time.after' => 'Waktu selesai harus setelah waktu mulai!',
            'end_time.before_or_equal' => 'Bimble tutup pukul 09.00 PM!',
            'id_guru.required' => 'Kolom wajib diisi!',
            'id_payment.required' => 'Kolom wajib diisi!',
        ]);

        // Cek apakah guru sudah mengajar di jadwal yang sama
        $conflict = Jadwal::where('id_guru', $request->id_guru)
            ->where('hari', $request->hari)
            ->where(function($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })
            ->exists();

        if ($conflict) {
            return back()->withErrors(['conflict' => 'Guru ini sudah mengajar di jadwal lain pada hari dan jam yang sama!'])->withInput();
        }

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
            'hari' => 'required',
            'start_time' => 'required|after_or_equal:08:00|before_or_equal:21:00',
            'end_time' => 'required|after:start_time|before_or_equal:21:00',
            'id_guru' => 'required|exists:guru,id_guru',
            'id_payment' => 'required|exists:payment,id_payment',
        ], [
            'hari.required' => 'Kolom wajib diisi!',
            'start_time.required' => 'Kolom wajib diisi!',
            'start_time.after_or_equal' => 'Bimble buka pukul 08:00 AM!',
            'start_time.before_or_equal' => 'Waktu mulai harus sebelum atau sama dengan 21:00!',
            'end_time.required' => 'Kolom wajib diisi!',
            'end_time.after' => 'Waktu selesai harus setelah waktu mulai!',
            'end_time.before_or_equal' => 'Bimble tutup pukul 09.00 PM!',
            'id_guru.required' => 'Kolom wajib diisi!',
            'id_payment.required' => 'Kolom wajib diisi!',
        ]);
    
        // Cek apakah guru sudah mengajar di jadwal yang sama, kecuali jadwal yang sedang diedit
        $conflict = Jadwal::where('id_guru', $request->id_guru)
            ->where('hari', $request->hari)
            ->where('id_guru', '!=', $jadwal->id_guru)
            ->where(function($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                      ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })
            ->exists();
    
        if ($conflict) {
            return back()->withErrors(['conflict' => 'Guru ini sudah mengajar di jadwal lain pada hari dan jam yang sama!'])->withInput();
        }
    
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
