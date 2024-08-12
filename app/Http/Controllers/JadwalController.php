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
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $paket = Paket::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        $payment = Payment::all();

        return view('jadwal.create', compact('paket', 'mapel', 'guru', 'payment'));
    }

    public function store(Request $request)
    {
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

        // Ambil id_mapel dari Guru berdasarkan id_guru yang dipilih
        $guru = Guru::findOrFail($request->id_guru);
        $validatedData['id_mapel'] = $guru->id_mapel;

        // Cek apakah guru sudah mengajar di jadwal yang sama dengan paket yang sama
        $conflict = Jadwal::where('id_guru', $request->id_guru)
            ->where('hari', $request->hari)
            ->where(function($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })
            ->where('id_payment', '!=', $request->id_payment)
            ->exists();

        if ($conflict) {
            return back()->withErrors(['conflict' => 'Jadwal bentrok! Pilih jam lain atau ganti guru.']);
        }

        Jadwal::create($validatedData);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function show(Jadwal $jadwal)
    {
        // Menampilkan detail jadwal tertentu
        return view('jadwal.show', compact('jadwal'));
    }

    public function edit($id_jadwal)
    {
        $jadwal = Jadwal::findOrFail($id_jadwal);
        $paket = Paket::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        $payment = Payment::all();

        return view('jadwal.edit', compact('jadwal', 'paket', 'mapel', 'guru', 'payment'));
    }

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

        // Ambil id_mapel dari Guru berdasarkan id_guru yang dipilih
        $guru = Guru::findOrFail($request->id_guru);
        $validatedData['id_mapel'] = $guru->id_mapel;

        // Cek apakah guru sudah mengajar di jadwal yang sama dengan paket yang sama, kecuali jadwal yang sedang diedit
        $conflict = Jadwal::where('id_guru', $request->id_guru)
            ->where('hari', $request->hari)
            ->where('id_jadwal', '!=', $jadwal->id_jadwal)
            ->where(function($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                      ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })
            ->where('id_payment', '!=', $request->id_payment)
            ->exists();

        if ($conflict) {
            return back()->withErrors(['conflict' => 'Guru ini sudah mengajar di jadwal lain pada hari dan jam yang sama dengan paket yang berbeda!'])->withInput();
        }

        // Memperbarui data jadwal
        $jadwal->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil diperbarui.');
    }

    public function destroy($id_jadwal)
    {
        $jadwal = Jadwal::findOrFail($id_jadwal);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
