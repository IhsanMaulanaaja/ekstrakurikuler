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

class StudentRegisteredUserController extends Controller
{
    /**
     * Display the student registration view.
     */
    public function create(): View
    {
        return view('auth.register-siswa');
    }

    /**
     * Handle an incoming registration request for a student.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nomor_telepon' => ['required', 'string', 'max:20'],
            'kelas' => ['required', 'string', 'max:50'],
            'alamat' => ['required', 'string'],
            'jurusan' => ['required', 'string', 'max:100'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
            'nomor_telepon' => $request->nomor_telepon,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard-siswa', absolute: false));
    }
}
