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
            'kelas' => ['required', 'integer', 'min:1', 'max:13'],
            'alamat' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before_or_equal:today'],
            'jenjang_pendidikan' => ['required', 'string', 'max:255'],
        ],[
            'name.required' => 'Kolom wajib diisi!',
            'email.required' => 'Kolom wajib diisi!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Kolom wajib diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'kelas.required' => 'Kolom wajib diisi!',
            'kelas.integer' => 'Wajib angka!',
            'kelas.min' => 'kelas minimal 1!',
            'kelas.max' => 'kelas maksimal 13!',
            'alamat.required' => 'Kolom wajib diisi!',
            'tanggal_lahir.required' => 'Kolom wajib diisi!',
            'tanggal_lahir.before_or_equal' => 'Tanggal lahir tidak boleh lebih dari hari ini!',
            'jenjang_pendidikan.required' => 'Kolom wajib diisi!',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kelas' => $request->kelas, 
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir, 
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard'))->with('success', 'Registration successful!');
    }

    /**
     * Display the list of users.
     */
    public function index(): View
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for editing a user.
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed', Rules\Password::defaults()],
            'kelas' => ['required', 'integer', 'min:1', 'max:13'],
            'alamat' => ['required', 'string', 'max:255'], 
            'tanggal_lahir' => ['required', 'date', 'before_or_equal:today'],
            'jenjang_pendidikan' => ['required', 'string', 'max:255'],
        ],[
            'name.required' => 'Kolom wajib diisi!',
            'email.required' => 'Kolom wajib diisi!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Kolom wajib diisi!',
            'password.min' => 'Password minimal 8 karakter!',
            'kelas.required' => 'Kolom wajib diisi!',
            'kelas.integer' => 'Wajib angka!',
            'kelas.min' => 'kelas minimal 1!',
            'kelas.max' => 'kelas maksimal 13!',
            'alamat.required' => 'Kolom wajib diisi!',
            'tanggal_lahir.required' => 'Kolom wajib diisi!',
            'tanggal_lahir.before_or_equal' => 'Tanggal lahir tidak boleh lebih dari hari ini!',
            'jenjang_pendidikan.required' => 'Kolom wajib diisi!',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->kelas = $request->kelas;
        $user->alamat = $request->alamat;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jenjang_pendidikan = $request->jenjang_pendidikan;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}