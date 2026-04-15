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

    protected static function boot()
    {
        parent::boot();

        // When AnggotaEkskul is deleted, also delete the corresponding Pendaftaran
        static::deleting(function ($model) {
            Pendaftaran::where('user_id', $model->user_id)
                ->where('ekskul_id', $model->ekskul_id)
                ->delete();
        });
    }
}
