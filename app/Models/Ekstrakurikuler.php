<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $table = 'ekstrakurikuler';
    protected $guarded = ['id'];
    protected $appends = ['foto_url'];

    public function getFotoUrlAttribute(): string
    {
        if (! $this->foto) {
            return asset('assets/logo.png');
        }

        if (str_starts_with($this->foto, 'http://') || str_starts_with($this->foto, 'https://')) {
            return $this->foto;
        }

        $foto = ltrim($this->foto, '/');
        $legacyName = pathinfo($foto, PATHINFO_FILENAME);
        $legacyMap = [
            'handball' => 'assets/ekskul/eskulhandball.png',
            'karate' => 'assets/ekskul/eskulkarate.png',
            'pencak_silat' => 'assets/ekskul/eskulsilat.png',
            'rohani_islam' => 'assets/ekskul/eskulrohis.png.jpeg',
            'bahasa_inggris' => 'assets/ekskul/eskulinggris.png.jpeg',
        ];
        $paths = [
            $foto,
            'assets/ekskul/'.$foto,
        ];

        if (isset($legacyMap[$legacyName])) {
            $paths[] = $legacyMap[$legacyName];
        }

        foreach ($paths as $path) {
            if (is_file(public_path($path))) {
                return asset($path);
            }
        }

        return asset($paths[0]);
    }

    public function pembina()
    {
        return $this->belongsTo(User::class, 'pembina_id');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalEkskul::class, 'ekskul_id');
    }

    public function anggota()
    {
        return $this->hasMany(AnggotaEkskul::class, 'ekskul_id');
    }
}
