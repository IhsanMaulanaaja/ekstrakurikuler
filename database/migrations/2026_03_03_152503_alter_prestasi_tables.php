<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('dokumentasi', function (Blueprint $table) {
            $table->dropForeign(['lomba_id']);
            $table->dropColumn('lomba_id');
            $table->string('nama_lomba')->nullable();
            $table->date('tanggal')->nullable();
        });

        Schema::table('lomba', function (Blueprint $table) {
            $table->string('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumentasi', function (Blueprint $table) {
            $table->foreignId('lomba_id')->nullable()->constrained('lomba')->onDelete('cascade');
            $table->dropColumn('nama_lomba');
            $table->dropColumn('tanggal');
        });

        Schema::table('lomba', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
