<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', Rules\Password::defaults()],
            'no_hp' => ['required', 'string', 'max:15'],
            'kelas' => ['required', 'string', 'max:10'],
            'alamat' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before_or_equal:today'],
            'jenjang_pendidikan' => ['required', 'string', 'max:255'],
        ],[
            'name.required' => 'Kolom nama wajib diisi!',
            'email.required' => 'Kolom email wajib diisi!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Kolom password wajib diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'no_hp.required' => 'Kolom nomor HP wajib diisi!',
            'kelas.required' => 'Kolom kelas wajib diisi!',
            'alamat.required' => 'Kolom alamat wajib diisi!',
            'tanggal_lahir.required' => 'Kolom tanggal lahir wajib diisi!',
            'tanggal_lahir.before_or_equal' => 'Tanggal lahir tidak boleh lebih dari hari ini!',
            'jenjang_pendidikan.required' => 'Kolom jenjang pendidikan wajib diisi!',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'kelas' => $request->kelas, 
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir, 
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('login'))->with('success', 'Registrasi berhasil!');
    }

    /**
     * Display the list of users.
     */
    public function index(): View
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // ... (metode lain tetap sama)
}