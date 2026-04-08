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
        // Pembina (id 3 - 12)

        $ekskuls = [
            ['nama' => 'Pramuka', 'deskripsi' => 'Ekstrakurikuler Wajib kepanduan', 'pembina_id' => 3, 'foto' => 'assets/pramuka.png'],
            ['nama' => 'Futsal', 'deskripsi' => 'Ekskul Olahraga Sepak Bola dalam ruangan', 'pembina_id' => 4, 'foto' => 'assets/futsal.png'],
            ['nama' => 'Basket', 'deskripsi' => 'Ekskul Olahraga Bola Basket', 'pembina_id' => 5, 'foto' => 'assets/basket.png'],
            ['nama' => 'PMR', 'deskripsi' => 'Ekskul Palang Merah Remaja', 'pembina_id' => 6, 'foto' => 'assets/pmr.png'],
            ['nama' => 'Voli', 'deskripsi' => 'Ekskul Olahraga Bola Voli', 'pembina_id' => 7, 'foto' => 'assets/voli.png'],
            ['nama' => 'Paskibra', 'deskripsi' => 'Ekskul Pasukan Pengibar Bendera', 'pembina_id' => 8, 'foto' => 'assets/paskibra.png'],
            ['nama' => 'Rohis', 'deskripsi' => 'Ekskul Kerohanian Islam', 'pembina_id' => 9, 'foto' => 'assets/rohis.png'],
            ['nama' => 'Seni Musik', 'deskripsi' => 'Ekskul Paduan Suara & Alat Musik', 'pembina_id' => 11, 'foto' => 'assets/seni_musik.png'],
            ['nama' => 'Taekwondo', 'deskripsi' => 'Ekskul Olahraga Bela Diri', 'pembina_id' => 12, 'foto' => 'assets/taekwondo.png'],
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
