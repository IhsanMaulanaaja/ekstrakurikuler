<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaEkskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswas = DB::table('users')->where('role', 'siswa')->get();
        $ekskuls = DB::table('ekstrakurikuler')->get();
        
        foreach ($siswas as $s) {
            // Masing-masing siswa aktif di 1-2 ekskul
            $ekskulTerpilih = $ekskuls->random(rand(1, 2));
            
            foreach ($ekskulTerpilih as $e) {
                DB::table('anggota_ekskul')->insertOrIgnore([
                    'user_id' => $s->id,
                    'ekskul_id' => $e->id,
                    'status' => 'aktif',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
