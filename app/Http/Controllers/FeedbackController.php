<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan daftar semua feedback
        $feedback = Feedback::all();
        return view('feedback.index', compact('feedback'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan formulir untuk membuat feedback baru
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'feedback' => 'required|string',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Tambahkan validasi tambahan jika diperlukan
        ], [
            'feedback.required' => 'Feedback wajib diisi.',
            'nama.required' => 'Kolom wajib diisi.',
            'email.required' => 'Kolom wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        // Membuat feedback baru
        Feedback::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        // Menampilkan detail feedback tertentu
        return view('feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        // Menampilkan formulir untuk mengedit data feedback
        return view('feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'feedback' => 'required|string',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Tambahkan validasi tambahan jika diperlukan
        ], [
            'feedback.required' => 'Feedback wajib diisi.',
            'nama.required' => 'Kolom wajib diisi.',
            'email.required' => 'Kolom wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        // Memperbarui data feedback
        $feedback->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('feedback.index')->with('success', 'Data feedback berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        // Menghapus data feedback
        $feedback->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('feedback.index')->with('success', 'Data feedback berhasil dihapus.');
    }
}
