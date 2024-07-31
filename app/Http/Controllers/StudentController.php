<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan daftar semua mahasiswa
        $student = Student::all();
        return view('student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan formulir untuk membuat mahasiswa baru
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'kelas' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'id' => 'required|exists:users,id',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk foto
        ], [
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.string' => 'Nomor HP harus berupa string.',
            'no_hp.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa string.',
            'kelas.required' => 'Kelas wajib diisi.',
            'kelas.string' => 'Kelas harus berupa string.',
            'kelas.max' => 'Kelas tidak boleh lebih dari 255 karakter.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'photo_profil.image' => 'File harus berupa gambar.',
            'photo_profil.mimes' => 'Gambar harus bertipe jpeg, png, jpg, atau gif.',
            'photo_profil.max' => 'Gambar tidak boleh lebih dari 2MB.',
        ]);

        // Menangani upload foto
        if ($request->hasFile('photo_profil')) {
            $file = $request->file('photo_profil');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/image', $fileName); // Simpan di folder storage/app/public/image
            $validatedData['photo_profil'] = $fileName;
        }

        // Membuat mahasiswa baru
        Student::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('student.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // Menampilkan detail mahasiswa tertentu
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // Menampilkan formulir untuk mengedit data mahasiswa
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'kelas' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'id' => 'required|exists:users,id',
            'photo_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk foto
        ], [
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.string' => 'Nomor HP harus berupa string.',
            'no_hp.max' => 'Nomor HP tidak boleh lebih dari 15 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa string.',
            'kelas.required' => 'Kelas wajib diisi.',
            'kelas.string' => 'Kelas harus berupa string.',
            'kelas.max' => 'Kelas tidak boleh lebih dari 255 karakter.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'photo_profil.image' => 'File harus berupa gambar.',
            'photo_profil.mimes' => 'Gambar harus bertipe jpeg, png, jpg, atau gif.',
            'photo_profil.max' => 'Gambar tidak boleh lebih dari 2MB.',
        ]);

        // Menangani upload foto jika ada
        if ($request->hasFile('photo_profil')) {
            // Hapus foto lama jika ada
            if ($student->photo_profil) {
                Storage::delete('public/image/' . $student->photo_profil);
            }
            
            $file = $request->file('photo_profil');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/image', $fileName);
            $validatedData['photo_profil'] = $fileName;
        }

        // Memperbarui data mahasiswa
        $student->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('student.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // Hapus foto jika ada
        if ($student->photo_profil) {
            Storage::delete('public/image/' . $student->photo_profil);
        }

        // Menghapus data mahasiswa
        $student->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('student.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
