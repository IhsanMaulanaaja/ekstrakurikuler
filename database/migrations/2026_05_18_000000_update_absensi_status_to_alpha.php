<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $driver = DB::connection()->getDriverName();

        if ($driver === 'mysql' || $driver === 'mariadb') {
            DB::statement("ALTER TABLE absensi MODIFY COLUMN status ENUM('hadir', 'izin', 'sakit', 'alpha') NOT NULL");
        }

        DB::table('absensi')->where('status', 'alfa')->update(['status' => 'alpha']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $driver = DB::connection()->getDriverName();

        DB::table('absensi')->where('status', 'alpha')->update(['status' => 'alfa']);

        if ($driver === 'mysql' || $driver === 'mariadb') {
            DB::statement("ALTER TABLE absensi MODIFY COLUMN status ENUM('hadir', 'izin', 'sakit', 'alfa') NOT NULL");
        }
    }
};
