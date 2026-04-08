<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pengumuman umum (ekskul_id null)
        DB::table('pengumuman')->insert([
            [
                'judul' => 'Pendaftaran Ekskul Baru Dibuka',
                'isi' => 'Silakan melakukan pendaftaran ekstrakurikuler bagi siswa yang belum terdaftar.',
                'ekskul_id' => null,
                'user_id' => 1, // Admin Utama
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Libur Latihan Mingguan',
                'isi' => 'Seluruh kegiatan latihan ekskul minggu depan ditiadakan sehubungan dengan Pekan Ulangan.',
                'ekskul_id' => null,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Pengumuman khusus ekskul
        $ekskuls = DB::table('ekstrakurikuler')->get();

        foreach ($ekskuls as $e) {
            DB::table('pengumuman')->insert([
                [
                    'judul' => 'Rapat Internal ' . $e->nama,
                    'isi' => 'Diharapkan seluruh anggota ' . $e->nama . ' untuk hadir rapat di ruang kelas.',
                    'ekskul_id' => $e->id,
                    'user_id' => $e->pembina_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
