<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Pendaftaran;
use App\Models\AnggotaEkskul;

return new class extends Migration
{
    public function up(): void
    {
        // Delete all Pendaftaran records that are marked as 'disetujui' 
        // but don't have a corresponding AnggotaEkskul entry
        $approvedPendaftaran = Pendaftaran::where('status', 'disetujui')->get();
        
        foreach ($approvedPendaftaran as $pend) {
            $anggota = AnggotaEkskul::where('user_id', $pend->user_id)
                ->where('ekskul_id', $pend->ekskul_id)
                ->first();
            
            if (!$anggota) {
                $pend->delete();  
            }
        }
    }

    public function down(): void
    {
        // This migration is data-only cleanup, no need to revert
    }
};
