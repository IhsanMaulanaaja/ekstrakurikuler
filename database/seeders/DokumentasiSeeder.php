<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumentasiSeeder extends Seeder
{
    public function run(): void
    {
        $ekskuls = DB::table('ekstrakurikuler')->get();
        $fotoFiles = [
            'futsal-unpak-pss-cup.jpg',
            'image92.jpg',
            'WhatsApp-Image-2025-10-20-at-145743-2454375474.jpeg',
            '1777691835_WhatsApp-Image-2025-10-20-at-145743-2454375474.jpeg',
            'L8m5nUdqTdqpWTL0hY1If8HPlqG3OHW6bA21iMQ2.png',
            'eXgtIDTsKZw14229eWBMFefh5zeYL5IPv39W3dpm.png',
            'hLYzxtwG8WRURVLq2560wJj0ncV9KBY1RgBBuD2F.jpg',
        ];

        $namaLombas = [
            'WALIKOTA CUP - Basket',
            'PSSI CUP - Futsal',
            'BASKET PROVINCIAL',
            'Lomba Voli Antar Sekolah',
            'Karate Championship',
            'Pencak Silat Tournament',
            'Paskibra National Competition',
        ];

        foreach (range(0, 6) as $idx) {
            if ($ekskuls->isNotEmpty() && isset($fotoFiles[$idx]) && isset($namaLombas[$idx])) {
                DB::table('dokumentasi')->insert([
                    'ekstrakurikuler_id' => $ekskuls->random()->id,
                    'foto' => 'assets/dokumentasi/' . $fotoFiles[$idx],
                    'nama_lomba' => $namaLombas[$idx],
                    'keterangan' => 'Dokumentasi prestasi siswa dalam kegiatan ekstrakurikuler',
                    'tanggal' => now()->subDays(rand(1, 60))->toDateString(),
                    'tanggal_juara' => now()->subDays(rand(1, 60))->toDateString(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

