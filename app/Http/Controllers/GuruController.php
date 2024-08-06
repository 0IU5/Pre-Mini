<?php   

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter pencarian dari query string
        $search = $request->input('search');
    
        // Buat query dasar
        $query = Guru::query();
    
        // Jika ada parameter pencarian, tambahkan kondisi WHERE
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('pendidikan_terakhir', 'like', "%{$search}%");
            });
        }
    
        // Terapkan paginasi pada hasil query
        $guru = $query->paginate(10);
    
        // Kembalikan view dengan data guru
        return view('guru.index', compact('guru'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan formulir untuk membuat data guru baru
        $mapel = Mapel::all(); // Mengambil data mata pelajaran untuk dropdown
        return view('guru.create', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:1|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pendidikan_terakhir' => 'required|string|max:255',
            'id_mapel' => 'required|exists:mapel,id_mapel' // Validasi ID mata pelajaran
        ],[
            'nama.required' => 'Kolom wajib diisi',
            'umur.required' => 'Kolom diisi',
            'umur.integer' => 'Usia harus berupa angka',
            'umur.min' => 'Usia minimal 1!',
            'umur.max' => 'Usia maksimal 100!',
            'foto.image' => 'Foto harus berupa gambar',
            'pendidikan_terakhir.required' => 'Pendidikan terakhir wajib diisi',
            'id_mapel.required' => 'Mata pelajaran wajib dipilih',
            'id_mapel.exists' => 'Mata pelajaran tidak ditemukan'
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
        $mapel = Mapel::all(); // Mengambil data mata pelajaran untuk dropdown
        return view('guru.edit', compact('guru', 'mapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:1|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pendidikan_terakhir' => 'required|string|max:255',
            'id_mapel' => 'required|exists:mapel,id_mapel' // Validasi ID mata pelajaran
        ],[
            'nama.required' => 'Kolom wajib diisi',
            'umur.required' => 'Kolom diisi',
            'umur.integer' => 'Usia harus berupa angka',
            'umur.min' => 'Usia minimal 1!',
            'umur.max' => 'Usia maksimal 100!',
            'foto.image' => 'Foto harus berupa gambar',
            'pendidikan_terakhir.required' => 'Pendidikan terakhir wajib diisi',
            'id_mapel.required' => 'Mata pelajaran wajib dipilih',
            'id_mapel.exists' => 'Mata pelajaran tidak ditemukan'
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
