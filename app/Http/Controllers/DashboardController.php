<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ekstrakurikuler;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user?->role === 'admin') {
            return redirect()->route('dashboard-admin');
        }
        if ($user?->role === 'pembina') {
            return redirect()->route('dashboard-pembina');
        }
        
        return redirect()->route('dashboard-siswa');
    }

    public function siswa()
    {
        $user = auth()->user();

        // 1. Ambil Ekskul Saya (yang sudah join dan status aktif) + Gabungkan jadwalnya untuk tampilan tabel
        $ekskulSiswa = DB::table('anggota_ekskul')
            ->join('ekstrakurikuler', 'anggota_ekskul.ekskul_id', '=', 'ekstrakurikuler.id')
            ->leftJoin('jadwal_ekskul', 'ekstrakurikuler.id', '=', 'jadwal_ekskul.ekskul_id')
            ->where('anggota_ekskul.user_id', $user->id)
            ->where('anggota_ekskul.status', 'aktif')
            ->select(
                'ekstrakurikuler.id',
                'ekstrakurikuler.nama',
                'ekstrakurikuler.foto',
                DB::raw("GROUP_CONCAT(CONCAT(jadwal_ekskul.hari, ' ', TIME_FORMAT(jadwal_ekskul.jam_mulai, '%H:%i')) SEPARATOR ', ') as jadwal_lengkap")
            )
            ->groupBy('ekstrakurikuler.id', 'ekstrakurikuler.nama', 'ekstrakurikuler.foto')
            ->get();

        // 2. Ambil Jadwal Terdekat (untuk ekskul yang diikuti)
        $ekskulIds = $ekskulSiswa->pluck('id')->toArray();
        
        $jadwalTerdekat = [];
        if (!empty($ekskulIds)) {
            $jadwalTerdekat = DB::table('jadwal_ekskul')
                ->join('ekstrakurikuler', 'jadwal_ekskul.ekskul_id', '=', 'ekstrakurikuler.id')
                ->whereIn('jadwal_ekskul.ekskul_id', $ekskulIds)
                ->select('jadwal_ekskul.*', 'ekstrakurikuler.nama as nama_ekskul')
                ->get()
                ->toArray();

            // Urutkan jadwal berdasarkan hari saat ini
            $hariMapping = [
                'senin' => 1, 'selasa' => 2, 'rabu' => 3, 'kamis' => 4,
                'jumat' => 5, 'sabtu' => 6, 'minggu' => 7
            ];
            $currentDayNum = Carbon::now()->dayOfWeekIso;

            usort($jadwalTerdekat, function($a, $b) use ($hariMapping, $currentDayNum) {
                $dayA = $hariMapping[strtolower($a->hari)];
                $dayB = $hariMapping[strtolower($b->hari)];
                
                $diffA = ($dayA >= $currentDayNum) ? ($dayA - $currentDayNum) : (7 - $currentDayNum + $dayA);
                $diffB = ($dayB >= $currentDayNum) ? ($dayB - $currentDayNum) : (7 - $currentDayNum + $dayB);
                
                return $diffA <=> $diffB;
            });
        }

        // 3. Kegiatan Bulan Ini (berdasarkan data Absensi)
        $bulanSekarang = Carbon::now()->month;
        $tahunSekarang = Carbon::now()->year;
        $jumlahKegiatan = DB::table('absensi')
            ->where('user_id', $user->id)
            ->whereMonth('tanggal', $bulanSekarang)
            ->whereYear('tanggal', $tahunSekarang)
            ->count();

        // 4. Data tanggal untuk tampilan widget
        $today = Carbon::now();
        $namaBulanShort = strtoupper($today->locale('id')->isoFormat('MMM'));
        $tanggalHariIni = $today->day;

        // 5. Prestasi (juara dari lomba di ekskul yang diikuti)
        $jumlahPrestasi = 0;
        if (!empty($ekskulIds)) {
            $jumlahPrestasi = DB::table('lomba')
                ->whereIn('ekskul_id', $ekskulIds)
                ->whereNotNull('juara')
                ->count();
        }

        // 6. Ambil Pengumuman (UMUM + sesuai ekskul yang diikuti)
        $pengumuman = DB::table('pengumuman')
            ->where(function($query) use ($ekskulIds) {
                $query->whereNull('ekskul_id')
                      ->orWhereIn('ekskul_id', $ekskulIds);
            })
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard-siswa', compact(
            'ekskulSiswa', 
            'jadwalTerdekat', 
            'jumlahKegiatan', 
            'namaBulanShort', 
            'tanggalHariIni',
            'jumlahPrestasi',
            'pengumuman'
        ));
    }

    public function admin()
    {
        // 1. Stats Pendaftaran
        $totalPendaftar = DB::table('pendaftaran')->count();
        $totalDitolak = DB::table('pendaftaran')->where('status', 'ditolak')->count();
        $totalDiterima = DB::table('pendaftaran')->where('status', 'disetujui')->count();

        // 2. Pendaftaran Terbaru (join dengan user dan ekskul)
        $pendaftaranTerbaru = DB::table('pendaftaran')
            ->join('users', 'pendaftaran.user_id', '=', 'users.id')
            ->join('ekstrakurikuler', 'pendaftaran.ekskul_id', '=', 'ekstrakurikuler.id')
            ->select('pendaftaran.*', 'users.name as nama_siswa', 'ekstrakurikuler.nama as nama_ekskul')
            ->orderBy('pendaftaran.created_at', 'desc')
            ->take(5)
            ->get();

        // 3. Data untuk "Grafik" (misal: Jumlah Siswa per Ekskul)
        $siswaPerEkskul = DB::table('anggota_ekskul')
            ->join('ekstrakurikuler', 'anggota_ekskul.ekskul_id', '=', 'ekstrakurikuler.id')
            ->where('anggota_ekskul.status', 'aktif')
            ->select('ekstrakurikuler.nama', DB::raw('count(*) as total'))
            ->groupBy('ekstrakurikuler.id', 'ekstrakurikuler.nama')
            ->get();

        return view('dashboard-admin', compact(
            'totalPendaftar', 
            'totalDitolak', 
            'totalDiterima', 
            'pendaftaranTerbaru',
            'siswaPerEkskul'
        ));
    }

    public function pembina()
    {
        if (auth()->user()?->role !== 'pembina') {
            abort(403);
        }
        return view('Admin.berandapembina');
    }
}
