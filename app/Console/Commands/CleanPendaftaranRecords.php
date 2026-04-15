<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pendaftaran;
use App\Models\AnggotaEkskul;

class CleanPendaftaranRecords extends Command
{
    protected $signature = 'db:clean-pendaftaran';
    protected $description = 'Clean Pendaftaran records that are approved but have no corresponding AnggotaEkskul (member was deleted)';

    public function handle()
    {
        // Find all approved Pendaftaran records
        $approvedPendaftaran = Pendaftaran::where('status', 'disetujui')->get();
        
        $deleted = 0;
        foreach ($approvedPendaftaran as $pend) {
            // Check if AnggotaEkskul exists
            $anggota = AnggotaEkskul::where('user_id', $pend->user_id)
                ->where('ekskul_id', $pend->ekskul_id)
                ->first();
            
            // If AnggotaEkskul doesn't exist, delete the Pendaftaran
            if (!$anggota) {
                $pend->delete();
                $deleted++;
                $this->info("Deleted Pendaftaran ID {$pend->id} for User {$pend->user_id} and Ekskul {$pend->ekskul_id}");
            }
        }
        
        $this->info("Total Pendaftaran records cleaned: {$deleted}");
    }
}
