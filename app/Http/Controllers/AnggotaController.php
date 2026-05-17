<?php

namespace App\Http\Controllers;

use App\Models\AnggotaEkskul;
use App\Models\Ekstrakurikuler;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function indexAdmin()
    {
        $user = auth()->user();
        $isAdmin = $user->role === 'admin';
        
        if ($user->role === 'pembina') {
            // Pembina hanya bisa melihat anggota dari ekskul yang mereka bina
            $ekskuls = Ekstrakurikuler::where('pembina_id', $user->id)->get();
            $ekskulIds = $ekskuls->pluck('id');
            $anggota = AnggotaEkskul::with('user', 'ekskul')
                ->whereIn('ekskul_id', $ekskulIds)
                ->latest('id')
                ->paginate(10);
            $ekskulName = $ekskuls->count() === 1 ? $ekskuls->first()->nama : null;
        } else {
            // Admin melihat SEMUA siswa yang telah disetujui (status = approved)
            $semuaSiswa = User::where('role', 'siswa')
                              ->where('status', 'approved')
                              ->paginate(10);
            $anggota = $semuaSiswa;
            $ekskuls = Ekstrakurikuler::all();
            $ekskulName = null;
        }
        
        return view('anggota-admin', compact('anggota', 'ekskuls', 'user', 'ekskulName', 'isAdmin'));
    }

    public function updateStatus(Request $request, $id)
    {
        $anggota = AnggotaEkskul::findOrFail($id);
        $user = auth()->user();

        // Jika pembina, pastikan anggota adalah dari ekskul yang mereka bina
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $anggota->ekskul_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses ke anggota ini');
            }
        }

        $request->validate([
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $anggota->status = $request->status;
        $anggota->save();

        return back()->with('success', 'Status anggota berhasil diperbarui');
    }

    public function destroy($id)
    {
        $anggota = AnggotaEkskul::findOrFail($id);
        $user = auth()->user();

        // Jika pembina, pastikan anggota adalah dari ekskul yang mereka bina
        if ($user->role === 'pembina') {
            $ekskul = Ekstrakurikuler::where('id', $anggota->ekskul_id)
                                    ->where('pembina_id', $user->id)
                                    ->first();
            if (!$ekskul) {
                return back()->with('error', 'Anda tidak memiliki akses ke anggota ini');
            }
        }

        // Hapus hanya record anggota ekskul, bukan akun User.
        // Juga hapus pendaftaran terkait agar siswa bisa mendaftar lagi jika diperlukan.
        Pendaftaran::where('user_id', $anggota->user_id)
                    ->where('ekskul_id', $anggota->ekskul_id)
                    ->delete();

        $anggota->delete();

        return back()->with('success', 'Anggota berhasil dihapus');
    }
}
