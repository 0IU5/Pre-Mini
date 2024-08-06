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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'kelas' => ['required', 'string', 'max:255'], // Validasi untuk kelas
            'alamat' => ['required', 'string', 'max:255'], // Validasi untuk alamat
            'tanggal_lahir' => ['required', 'date'], // Validasi untuk tanggal lahir
            'jenjang_pendidikan' => ['required', 'string', 'max:255'], // Validasi untuk jenjang pendidikan
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kelas' => $request->kelas, // Menyimpan kelas
            'alamat' => $request->alamat, // Menyimpan alamat
            'tanggal_lahir' => $request->tanggal_lahir, // Menyimpan tanggal lahir
            'jenjang_pendidikan' => $request->jenjang_pendidikan, // Menyimpan jenjang pendidikan
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('login', absolute: false))->with('success', 'Registration successful!');
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'kelas' => ['required', 'string', 'max:255'], // Validasi untuk kelas
            'alamat' => ['required', 'string', 'max:255'], // Validasi untuk alamat
            'tanggal_lahir' => ['required', 'date'], // Validasi untuk tanggal lahir
            'jenjang_pendidikan' => ['required', 'string', 'max:255'], // Validasi untuk jenjang pendidikan
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->kelas = $request->kelas; // Update kelas
        $user->alamat = $request->alamat; // Update alamat
        $user->tanggal_lahir = $request->tanggal_lahir; // Update tanggal lahir
        $user->jenjang_pendidikan = $request->jenjang_pendidikan; // Update jenjang pendidikan
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
