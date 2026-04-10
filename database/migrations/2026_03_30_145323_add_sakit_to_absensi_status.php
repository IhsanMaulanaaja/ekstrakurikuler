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
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys=OFF');

            // Check if the table needs to be recreated (if sakit is not in enum)
            $columns = DB::select("PRAGMA table_info(absensi)");
            $statusColumn = collect($columns)->firstWhere('name', 'status');

            if ($statusColumn && !str_contains($statusColumn->type, 'sakit')) {
                // Drop the unique index first
                DB::statement('DROP INDEX IF EXISTS absensi_user_id_ekskul_id_tanggal_unique');
                
                Schema::rename('absensi', 'absensi_old');

                Schema::create('absensi', function (Blueprint $table) {
                    $table->id();
                    $table->foreignId('user_id')->constrained()->onDelete('cascade');
                    $table->foreignId('ekskul_id')->constrained('ekstrakurikuler')->onDelete('cascade');
                    $table->date('tanggal');
                    $table->enum('status', ['hadir', 'izin', 'sakit', 'alfa']);
                    $table->text('keterangan')->nullable();
                    $table->timestamps();
                    $table->unique(['user_id', 'ekskul_id', 'tanggal']);
                });

                DB::statement(
                    'INSERT INTO absensi (id, user_id, ekskul_id, tanggal, status, keterangan, created_at, updated_at) SELECT id, user_id, ekskul_id, tanggal, status, keterangan, created_at, updated_at FROM absensi_old'
                );

                Schema::dropIfExists('absensi_old');
            }

            DB::statement('PRAGMA foreign_keys=ON');
        } else {
            DB::statement("ALTER TABLE absensi MODIFY COLUMN status ENUM('hadir', 'izin', 'sakit', 'alfa') NOT NULL");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::getConnection()->getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys=OFF');

            Schema::rename('absensi', 'absensi_old');

            Schema::create('absensi', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('ekskul_id')->constrained('ekstrakurikuler')->onDelete('cascade');
                $table->date('tanggal');
                $table->enum('status', ['hadir', 'izin', 'alfa']);
                $table->text('keterangan')->nullable();
                $table->timestamps();
                $table->unique(['user_id', 'ekskul_id', 'tanggal']);
            });

            DB::statement(
                'INSERT INTO absensi (id, user_id, ekskul_id, tanggal, status, keterangan, created_at, updated_at) SELECT id, user_id, ekskul_id, tanggal, status, keterangan, created_at, updated_at FROM absensi_old'
            );

            Schema::dropIfExists('absensi_old');
            DB::statement('PRAGMA foreign_keys=ON');
        } else {
            DB::statement("ALTER TABLE absensi MODIFY COLUMN status ENUM('hadir', 'izin', 'alfa') NOT NULL");
        }
    }
};
