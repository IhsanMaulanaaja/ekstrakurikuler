<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EkstrakulikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin (id 1)
        // Siswa (id 2)
        // Pembina (id 3 - 11)

        $ekskuls = [
            ['nama' => 'Basket', 'deskripsi' => 'Ekskul Olahraga Bola Basket', 'pembina_id' => 3, 'foto' => 'assets/basket.png'],
            ['nama' => 'Voli', 'deskripsi' => 'Ekskul Olahraga Bola Voli', 'pembina_id' => 4, 'foto' => 'assets/voli.png'],
            ['nama' => 'Handball', 'deskripsi' => 'Ekskul Olahraga Handa Bola', 'pembina_id' => 5, 'foto' => 'assets/handball.png'],
            ['nama' => 'Karate', 'deskripsi' => 'Ekskul Olahraga Karate', 'pembina_id' => 6, 'foto' => 'assets/karate.png'],
            ['nama' => 'Pencak Silat', 'deskripsi' => 'Ekskul Olahraga Bela Diri Pencak Silat', 'pembina_id' => 7, 'foto' => 'assets/pencak_silat.png'],
            ['nama' => 'Rohani Islam', 'deskripsi' => 'Ekskul Kerohanian Islam', 'pembina_id' => 8, 'foto' => 'assets/rohani_islam.png'],
            ['nama' => 'Paskibra', 'deskripsi' => 'Ekskul Pasukan Pengibar Bendera', 'pembina_id' => 9, 'foto' => 'assets/paskibra.png'],
            ['nama' => 'PMR', 'deskripsi' => 'Ekskul Palang Merah Remaja', 'pembina_id' => 10, 'foto' => 'assets/pmr.png'],
            ['nama' => 'Bahasa Inggris', 'deskripsi' => 'Ekskul Pengembangan Bahasa Inggris', 'pembina_id' => 11, 'foto' => 'assets/bahasa_inggris.png'],
        ];

        foreach ($ekskuls as $e) {
            DB::table('ekstrakurikuler')->insert([
                'nama' => $e['nama'],
                'deskripsi' => $e['deskripsi'],
                'pembina_id' => $e['pembina_id'],
                'foto' => $e['foto'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
