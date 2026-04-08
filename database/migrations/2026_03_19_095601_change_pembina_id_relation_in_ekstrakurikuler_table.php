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
        Schema::table('ekstrakurikuler', function (Blueprint $table) {
            $table->dropForeign(['pembina_id']);
        });

        Schema::dropIfExists('pembina');

        Schema::table('ekstrakurikuler', function (Blueprint $table) {
            $table->foreign('pembina_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ekstrakurikuler', function (Blueprint $table) {
            $table->dropForeign(['pembina_id']);
        });

        Schema::create('pembina', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        Schema::table('ekstrakurikuler', function (Blueprint $table) {
            $table->foreign('pembina_id')->references('id')->on('pembina')->onDelete('cascade');
        });
    }
};
