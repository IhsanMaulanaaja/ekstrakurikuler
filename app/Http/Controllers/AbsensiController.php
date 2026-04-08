<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Ekstrakurikuler;
use App\Models\AnggotaEkskul;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        
        if ($user?->role === 'admin' || $user?->role === 'pembina') {
            $query = Absensi::with(['user', 'ekskul']);
            
            if ($user->role === 'pembina') {
                // Pembina hanya bisa melihat absensi ekskul yang mereka bina
                $ekskulIds = Ekstrakurikuler::where('pembina_id', $user->id)->pluck('id');
                $query->whereIn('ekskul_id', $ekskulIds);
            }

            // Tanggal Filter
            $tanggal = $request->query('tanggal', Carbon::now()->format('Y-m-d'));
            if ($tanggal) {
                $query->whereDate('tanggal', $tanggal);
            }

            // Status Filter
            $status = $request->query('status');
            if ($status && $status !== 'semua') {
                $query->where('status', $status);
            }

            // Nama Filter
            $nama = $request->query('nama');
            if ($nama) {
                $query->whereHas('user', function ($q) use ($nama) {
                    $q->where('name', 'like', '%' . $nama . '%');
                });
            }

            $absensiList = $query->get();
            return view('absensi-admin', compact('absensiList', 'ekskul', 'tanggal', 'status', 'nama'));
        }
        
        return view('absensi-ekskul-siswa');
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403);
        }
        
        $request->validate([
            'status' => 'required|in:hadir,izin,sakit,alfa',
            'keterangan' => 'nullable|string'
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return back()->with('success', 'Absensi berhasil diupdate');
    }

    public function siswa()
    {
        $user = auth()->user();
        
        // Ambil daftar ekskul yang diikuti oleh siswa
        $ekskulDikuti = DB::table('anggota_ekskul')
            ->join('ekstrakurikuler', 'anggota_ekskul.ekskul_id', '=', 'ekstrakurikuler.id')
            ->where('anggota_ekskul.user_id', $user->id)
            ->where('anggota_ekskul.status', 'aktif')
            ->select('ekstrakurikuler.*')
            ->get();

        return view('absensi-ekskul-siswa', compact('ekskulDikuti'));
    }

    public function storeSiswa(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'ekskul_id' => 'required|exists:ekstrakurikuler,id',
            'status' => 'required|in:hadir,izin,sakit,alfa',
            'keterangan' => 'nullable|string'
        ]);

        // Cek apakah siswa memang anggota ekskul tersebut
        $isAnggota = DB::table('anggota_ekskul')
            ->where('user_id', $user->id)
            ->where('ekskul_id', $request->ekskul_id)
            ->where('status', 'aktif')
            ->exists();

        if (!$isAnggota) {
            return back()->with('error', 'Anda tidak terdaftar di ekskul ini.');
        }

        // Cek apakah sudah absen hari ini untuk ekskul tersebut
        $today = Carbon::today()->toDateString();
        $alreadyAbsent = Absensi::where('user_id', $user->id)
            ->where('ekskul_id', $request->ekskul_id)
            ->whereDate('tanggal', $today)
            ->exists();

        if ($alreadyAbsent) {
            return back()->with('error', 'Anda sudah melakukan absensi hari ini untuk ekskul ini.');
        }

        Absensi::create([
            'user_id' => $user->id,
            'ekskul_id' => $request->ekskul_id,
            'tanggal' => $today,
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return back()->with('success', 'Absensi berhasil disimpan!');
    }
}
