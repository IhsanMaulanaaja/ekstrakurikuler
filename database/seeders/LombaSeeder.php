<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lomba')->insert([
            [
                'ekskul_id' => 1, // Pramuka
                'nama_lomba' => 'Lomba Tingkat Pramuka Penggalang',
                'tanggal' => '2025-08-14',
                'tingkat' => 'Kota',
                'juara' => 'Juara 1',
                'deskripsi' => 'Lomba tingkat penggalang se-kota',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ekskul_id' => 2, // Futsal
                'nama_lomba' => 'Turnamen Futsal Pelajar',
                'tanggal' => '2025-10-20',
                'tingkat' => 'Provinsi',
                'juara' => 'Juara 2',
                'deskripsi' => 'Turnamen futsal antar sekolah se-provinsi',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
