<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = \Illuminate\Support\Facades\DB::table('anggota_ekskul')->where('status', 'aktif')->get();
        $statuses = ['hadir', 'izin', 'sakit', 'alpha'];
        
        foreach ($members as $m) {
            // Buat absensi untuk 5 tanggal terakhir (misal tiap jumat)
            for ($i = 0; $i < 5; $i++) {
                $tanggal = \Carbon\Carbon::now()->subWeeks($i);
                
                \Illuminate\Support\Facades\DB::table('absensi')->insertOrIgnore([
                    'user_id' => $m->user_id,
                    'ekskul_id' => $m->ekskul_id,
                    'tanggal' => $tanggal->format('Y-m-d'),
                    'status' => $statuses[array_rand($statuses)],
                    'keterangan' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
