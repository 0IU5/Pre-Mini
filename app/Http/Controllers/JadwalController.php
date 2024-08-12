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

        $conflict = Jadwal::where('hari', $request->hari)
            ->where('start_time', '<', $request->end_time)
            ->where('end_time', '>', $request->start_time)
            ->where('id_guru', $request->id_guru)
            ->first();

        if ($conflict) {
            return back()->withErrors(['conflict' => 'Jadwal bentrok! Pilih jam lain atau ganti guru.']);
        }

        Jadwal::create($validatedData);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }
    
    /**
     * Display the specified resource.
     */
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

    public function update(Request $request, $id_jadwal)
    {
        $jadwal = Jadwal::findOrFail($id_jadwal);

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

        $conflict = Jadwal::where('hari', $request->hari)
            ->where('start_time', '<', $request->end_time)
            ->where('end_time', '>', $request->start_time)
            ->where('id_guru', $request->id_guru)
            ->where('id_jadwal', '!=', $id_jadwal)
            ->first();

        if ($conflict) {
            return back()->withErrors(['conflict' => 'Jadwal bentrok! Pilih jam lain atau ganti guru.']);
        }

        $jadwal->update($validatedData);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id_jadwal)
    {
        $jadwal = Jadwal::findOrFail($id_jadwal);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
