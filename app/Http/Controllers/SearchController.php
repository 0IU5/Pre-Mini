<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $query = strtolower($query); // Ubah kata kunci menjadi huruf kecil untuk konsistensi

        switch ($query) {
            case 'payment':
                return redirect()->route('payment.index');
            case 'jadwal':
                return redirect()->route('jadwal.index');
            case 'feedback':
                return redirect()->route('feedback.index');
            case 'mapel':
                return redirect()->route('mapel.index');
            case 'student':
                return redirect()->route('student.index');
            default:
                return redirect()->route('dashboard')->with('error', 'Halaman tidak ditemukan.');
        }
    }
}
