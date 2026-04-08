<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaEkskul extends Model
{
    protected $table = 'anggota_ekskul';

    protected $fillable = [
        'user_id',
        'ekskul_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ekskul()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'ekskul_id');
    }
}
