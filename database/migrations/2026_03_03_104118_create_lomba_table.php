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
        Schema::create('lomba', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ekskul_id')->constrained('ekstrakurikuler')->onDelete('cascade');
            $table->string('nama_lomba');
            $table->date('tanggal');
            $table->string('tingkat')->nullable(); // sekolah/kota/provinsi
            $table->string('juara')->nullable();   // juara 1, 2, 3
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lomba');
    }
};
