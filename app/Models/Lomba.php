<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    protected $table = 'lomba';
    protected $guarded = ['id'];

    public function ekskul()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'ekskul_id');
    }

    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class, 'lomba_id');
    }
}
