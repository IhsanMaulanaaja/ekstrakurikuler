<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pembina')->insert([
            [
                'nama' => 'Budi Santoso',
                'no_hp' => '081234567890',
                'email' => 'budi@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'no_hp' => '081298765432',
                'email' => 'siti@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
