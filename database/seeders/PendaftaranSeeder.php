<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswas = DB::table('users')->where('role', 'siswa')->get();
        $ekskuls = DB::table('ekstrakurikuler')->get();
        $statuses = ['menunggu', 'disetujui', 'ditolak'];
        $created = [];

        foreach ($siswas as $s) {
            // Masing-masing siswa daftar 1-2 ekskul
            $ekskulTerpilih = $ekskuls->random(rand(1, 2));

            foreach ($ekskulTerpilih as $e) {
                $status = $statuses[array_rand($statuses)];
                $pendaftaranId = DB::table('pendaftaran')->insertGetId([
                    'user_id' => $s->id,
                    'ekskul_id' => $e->id,
                    'tanggal_daftar' => now()->subDays(rand(1, 30)),
                    'alasan' => 'Ingin mengembangkan bakat di bidang ' . $e->nama,
                    'status' => $status,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                if ($status === 'disetujui') {
                    DB::table('anggota_ekskul')->insertOrIgnore([
                        'user_id' => $s->id,
                        'ekskul_id' => $e->id,
                        'status' => 'aktif',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                $created[] = ['id' => $pendaftaranId, 'status' => $status];
            }
        }

        // Pastikan ada setidaknya beberapa pendaftaran disetujui agar dashboard tidak kosong.
        if (!collect($created)->contains('status', 'disetujui')) {
            $first = collect($created)->first();
            if ($first) {
                DB::table('pendaftaran')->where('id', $first['id'])->update(['status' => 'disetujui']);
                $row = DB::table('pendaftaran')->where('id', $first['id'])->first();
                DB::table('anggota_ekskul')->insertOrIgnore([
                    'user_id' => $row->user_id,
                    'ekskul_id' => $row->ekskul_id,
                    'status' => 'aktif',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
