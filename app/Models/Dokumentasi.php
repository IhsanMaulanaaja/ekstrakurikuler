<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';
    protected $guarded = ['id'];
    protected $dates = ['tanggal', 'tanggal_juara'];
    protected $appends = ['fotoUrl'];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'lomba_id');
    }

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'ekstrakurikuler_id');
    }

    public function getFotoUrlAttribute()
    {
        if (!$this->foto) {
            return asset('assets/siswa.png');
        }

        $foto = trim($this->foto);

        if (filter_var($foto, FILTER_VALIDATE_URL)) {
            return $foto;
        }

        if (str_starts_with($foto, 'storage/')) {
            return asset($foto);
        }

        if (str_starts_with($foto, 'dokumentasi/')) {
            return asset('storage/' . ltrim($foto, '/'));
        }

        if (str_starts_with($foto, 'assets/')) {
            return asset($foto);
        }

        if (preg_match('/^[^\/\\]+\.[a-zA-Z0-9]+$/', $foto)) {
            return asset('assets/dokumentasi/' . $foto);
        }

        return asset($foto);
    }
}
