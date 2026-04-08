<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalEkskul extends Model
{
    protected $table = 'jadwal_ekskul';
    protected $fillable = [
        'ekskul_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'lokasi',
    ];
}
