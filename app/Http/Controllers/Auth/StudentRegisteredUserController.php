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
            'nisn' => ['required', 'string', 'max:20', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nomor_telepon' => ['required', 'string', 'max:20'],
            // kelas_jurusan must start with a Roman numeral (I..XII) followed by space and rest (e.g. "XI PPLG 1")
            'kelas_jurusan' => ['required', 'string', 'max:150', 'regex:/^(?i)(I|II|III|IV|V|VI|VII|VIII|IX|X|XI|XII)\s+.+$/'],
            'alamat' => ['required', 'string'],
        ], [
            'kelas_jurusan.regex' => 'Format kelas harus diawali angka romawi (contoh: XI PPLG 1).'
        ]);

        $inputKelas = trim($request->kelas_jurusan);
        $kelas = $inputKelas;
        $jurusan = null;

        // If user used '&' separator, keep existing behavior but normalize jurusan
        if (str_contains($inputKelas, '&')) {
            [$left, $right] = array_map('trim', explode('&', $inputKelas, 2));
            $kelas = $left;
            $jurusan = strtoupper($right);
        } else {
            // Try to extract roman + jurusan pattern like: "XI PPLG 1"
            if (preg_match('/^(?i)(I|II|III|IV|V|VI|VII|VIII|IX|X|XI|XII)\s+([A-Za-z]+)(?:\s+(.*))?$/i', $inputKelas, $m)) {
                $roman = strtoupper($m[1]);
                $candidate = strtoupper($m[2]);
                $rest = isset($m[3]) ? trim($m[3]) : '';

                $allowed = ['PPLG','TO','ANM','BCF','TPFL'];
                if (in_array($candidate, $allowed, true)) {
                    $jurusan = $candidate;
                    // remove duplicate jurusan if it appears again in the rest (e.g. "1 BCF")
                    if ($rest !== '') {
                        $rest = preg_replace('/(\b' . preg_quote($candidate, '/') . '\b\s*$)|(\s*\b' . preg_quote($candidate, '/') . '\b\s*)/i', ' ', $rest);
                        $rest = trim($rest);
                    }
                    // store kelas in the desired display order: ROMAN JURUSAN REST (e.g. "XI BCF 1")
                    $kelas = $roman . ' ' . $candidate . ($rest !== '' ? ' ' . $rest : '');
                } else {
                    // If not an allowed jurusan, keep original but uppercase the roman part
                    $kelas = $roman . ($rest !== '' ? ' ' . $candidate . ($rest !== '' ? ' ' . $rest : '') : ' ' . $candidate);
                }
            }
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nisn' => $request->nisn,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
            'status' => 'pending',
            'nomor_telepon' => $request->nomor_telepon,
            'kelas' => $kelas,
            'alamat' => $request->alamat,
            'jurusan' => $jurusan,
        ]);

        event(new Registered($user));

        return redirect(route('register-success'))->with('status', 'Akun Anda telah dibuat dan sedang menunggu persetujuan admin. Silakan login setelah akun Anda disetujui.');
    }
}
