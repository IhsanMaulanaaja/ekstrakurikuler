<?php

namespace App\Services;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceService
{
    public function markMissingScheduleAttendanceAsAlpha($user): void
    {
        if (! $user || $user->role !== 'siswa') {
            return;
        }

        $yesterday = Carbon::yesterday();
        $dayName = strtolower($yesterday->format('l'));

        $dayMap = [
            'monday' => 'senin',
            'tuesday' => 'selasa',
            'wednesday' => 'rabu',
            'thursday' => 'kamis',
            'friday' => 'jumat',
            'saturday' => 'sabtu',
            'sunday' => 'minggu',
        ];

        $jadwalHari = $dayMap[$dayName] ?? $dayName;

        $ekskulIds = DB::table('anggota_ekskul')
            ->join('jadwal_ekskul', 'anggota_ekskul.ekskul_id', '=', 'jadwal_ekskul.ekskul_id')
            ->where('anggota_ekskul.user_id', $user->id)
            ->where('anggota_ekskul.status', 'aktif')
            ->where('jadwal_ekskul.hari', $jadwalHari)
            ->distinct()
            ->pluck('anggota_ekskul.ekskul_id');

        if ($ekskulIds->isEmpty()) {
            return;
        }

        $yesterdayDate = $yesterday->toDateString();

        foreach ($ekskulIds as $ekskulId) {
            $alreadyHasAttendance = Absensi::where('user_id', $user->id)
                ->where('ekskul_id', $ekskulId)
                ->whereDate('tanggal', $yesterdayDate)
                ->exists();

            if ($alreadyHasAttendance) {
                continue;
            }

            $missingStatus = DB::getDriverName() === 'sqlite' ? 'alfa' : 'alpha';

            Absensi::create([
                'user_id' => $user->id,
                'ekskul_id' => $ekskulId,
                'tanggal' => $yesterdayDate,
                'status' => $missingStatus,
                'keterangan' => 'Tidak hadir pada jadwal latihan kemarin.',
            ]);
        }
    }
}
