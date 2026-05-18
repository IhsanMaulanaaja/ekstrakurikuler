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
        $connection = Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->getName();

        if ($connection === 'mysql' || $connection === 'pgsql') {
            DB::statement("ALTER TABLE absensi MODIFY COLUMN status ENUM('hadir', 'izin', 'sakit', 'alpha') NOT NULL");
        }

        DB::table('absensi')->where('status', 'alfa')->update(['status' => 'alpha']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $connection = Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->getName();

        DB::table('absensi')->where('status', 'alpha')->update(['status' => 'alfa']);

        if ($connection === 'mysql' || $connection === 'pgsql') {
            DB::statement("ALTER TABLE absensi MODIFY COLUMN status ENUM('hadir', 'izin', 'sakit', 'alfa') NOT NULL");
        }
    }
};
