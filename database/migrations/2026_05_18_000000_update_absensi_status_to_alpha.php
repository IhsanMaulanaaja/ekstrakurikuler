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
        } elseif ($driver === 'sqlite') {
            $this->rebuildSqliteAbsensiTable(['hadir', 'izin', 'sakit', 'alpha'], 'alpha');
            return;
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
        } elseif ($driver === 'sqlite') {
            $this->rebuildSqliteAbsensiTable(['hadir', 'izin', 'sakit', 'alfa'], 'alfa');
        }
    }

    private function rebuildSqliteAbsensiTable(array $statuses, string $alphaValue): void
    {
        DB::statement('PRAGMA foreign_keys=OFF');
        DB::statement('DROP INDEX IF EXISTS absensi_user_id_ekskul_id_tanggal_unique');

        Schema::rename('absensi', 'absensi_old');

        Schema::create('absensi', function (Blueprint $table) use ($statuses) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('ekskul_id')->constrained('ekstrakurikuler')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status', $statuses);
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->float('accuracy')->nullable();
            $table->timestamp('gps_timestamp')->nullable();
        });

        DB::statement(
            "INSERT INTO absensi (id, user_id, ekskul_id, tanggal, status, keterangan, created_at, updated_at, latitude, longitude, accuracy, gps_timestamp)
             SELECT id, user_id, ekskul_id, tanggal, CASE WHEN status IN ('alfa', 'alpha') THEN ? ELSE status END, keterangan, created_at, updated_at, latitude, longitude, accuracy, gps_timestamp
             FROM absensi_old",
            [$alphaValue]
        );

        Schema::dropIfExists('absensi_old');
        DB::statement('PRAGMA foreign_keys=ON');
    }
};
