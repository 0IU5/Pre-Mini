<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $query = strtolower($query); // Ubah kata kunci menjadi huruf kecil untuk konsistensi

        $routes = [
            'payment' => 'payment.index',
            'home' => 'dashboard',
            'jadwal' => 'jadwal.index',
            'feedback' => 'feedback.index',
            'mapel' => 'mapel.index',
            'guru' => 'guru.index',
            'paket' => 'paket.index',
        ];

        if (array_key_exists($query, $routes)) {
            return redirect()->route($routes[$query]);
        }

        // Jika tidak ada hasil, tampilkan pesan error dan tetap di halaman yang sama
        return redirect()->back()->withInput()->with('search-error', 'Data tidak ditemukan.');
    }
}
