<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Siswa
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'siswa@example.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
            'kelas' => 'XII RPL 1',
        ]);

        // list Pembina
        $pembina = [
            ['name' => 'Hendra Wijaya', 'email' => 'hendra@example.com'],
            ['name' => 'Siti Rahma', 'email' => 'siti@example.com'],
            ['name' => 'Agus Kurniawan', 'email' => 'agus@example.com'],
            ['name' => 'Lutfi Hakim', 'email' => 'lutfi@example.com'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi@example.com'],
            ['name' => 'Ripan Fauzi', 'email' => 'ripan@example.com'],
            ['name' => 'Maya Indah', 'email' => 'maya@example.com'],
            ['name' => 'Doni Setiawan', 'email' => 'doni@example.com'],
            ['name' => 'Ratna Sari', 'email' => 'ratna@example.com'],
            ['name' => 'Andi Pratama', 'email' => 'andi@example.com'],
        ];

        foreach ($pembina as $p) {
            User::create([
                'name' => $p['name'],
                'email' => $p['email'],
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
        }

        // List Siswa Tambahan (15 orang)
        $siswaTambahan = [
            ['name' => 'Ahmad Fauzi', 'email' => 'ahmad@example.com', 'kelas' => 'XII RPL 1'],
            ['name' => 'Siti Aminah', 'email' => 'siti_a@example.com', 'kelas' => 'XII RPL 1'],
            ['name' => 'Rizky Pratama', 'email' => 'rizky@example.com', 'kelas' => 'XII RPL 2'],
            ['name' => 'Dewi Sartika', 'email' => 'dewi_s@example.com', 'kelas' => 'XII RPL 2'],
            ['name' => 'Bambang Pamungkas', 'email' => 'bambang@example.com', 'kelas' => 'XI TKJ 1'],
            ['name' => 'Lani Cahyani', 'email' => 'lani@example.com', 'kelas' => 'XI TKJ 1'],
            ['name' => 'Guntur Bumi', 'email' => 'guntur@example.com', 'kelas' => 'XI TKJ 2'],
            ['name' => 'Maya Soetoro', 'email' => 'maya_s@example.com', 'kelas' => 'XI TKJ 2'],
            ['name' => 'Hendro Kumoro', 'email' => 'hendro@example.com', 'kelas' => 'X MM 1'],
            ['name' => 'Indah Permatasari', 'email' => 'indah@example.com', 'kelas' => 'X MM 1'],
            ['name' => 'Joko Widodo', 'email' => 'joko@example.com', 'kelas' => 'X MM 2'],
            ['name' => 'Ratna Galih', 'email' => 'ratna_g@example.com', 'kelas' => 'X MM 2'],
            ['name' => 'Taufik Hidayat', 'email' => 'taufik@example.com', 'kelas' => 'XII RPL 1'],
            ['name' => 'Putri Ayu', 'email' => 'putri@example.com', 'kelas' => 'XI TKJ 1'],
            ['name' => 'Gilang Dirga', 'email' => 'gilang@example.com', 'kelas' => 'X MM 1'],
        ];

        foreach ($siswaTambahan as $s) {
            User::create([
                'name' => $s['name'],
                'email' => $s['email'],
                'password' => Hash::make('password'),
                'role' => 'siswa',
                'kelas' => $s['kelas'],
            ]);
        }
    }
}
