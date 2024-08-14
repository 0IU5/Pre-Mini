<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Jaket;
use Illuminate\Http\Request;

class JaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jaket = Jaket::with('paket')->get(); // Mengambil semua data jaket beserta relasi paketnya
        return view('jaket.index', compact('jaket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paket = Paket::all(); // Mengambil semua data paket
        return view('jaket.create', compact('paket'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string',
            'id_paket' => 'required|unique:jaket,id_paket|exists:paket,id_paket',
        ],[
            'hari.required' => 'Kolom wajib diisi!',
            'id_paket.required' => 'Kolom wajib diisi!',
            'id_paket.exists' => 'Paket tidak ditemukan!',
            'id_paket.unique' => 'Paket sudah ada!'
        ]);

        $jaket = Jaket::create($request->all());
        return redirect()->route('jaket.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jaket $jaket)
    {
        return view('jaket.show', compact('jaket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jaket $jaket)
    {
        $paket = Paket::all(); // Mengambil semua data paket
        return view('jaket.edit', compact('jaket', 'paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jaket $jaket)
{
    $request->validate([
        'hari' => 'required|string',
        'id_paket' => 'required|exists:paket,id_paket|unique:jaket,id_paket,' . $jaket->id_jaket . ',id_jaket',
    ],[
        'hari.required' => 'Kolom wajib diisi!',
        'id_paket.required' => 'Kolom wajib diisi!',
        'id_paket.exists' => 'Paket tidak ditemukan!',
        'id_paket.unique' => 'Paket sudah ada!'
    ]);

    $jaket->update($request->all());
    return redirect()->route('jaket.index')->with('success', 'Data berhasil diupdate.');
}


    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jaket $jaket)
    {
        $jaket->delete();
        return redirect()->route('jaket.index')->with('success', 'Data berhasil dihapus.');
    }
}
