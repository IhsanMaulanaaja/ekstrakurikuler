<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SiswaLoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login-siswa');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = Auth::user();

        // only students may log in through this page
        if ($user->role !== 'siswa') {
            Auth::logout();

            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        // Check if user account is approved
        if ($user->status === 'pending') {
            Auth::logout();

            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'Akun Anda masih menunggu persetujuan admin. Silakan hubungi admin untuk konfirmasi.',
            ]);
        }

        if ($user->status === 'rejected') {
            Auth::logout();

            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'Akun Anda telah ditolak. Silakan hubungi admin untuk informasi lebih lanjut.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard-siswa', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
