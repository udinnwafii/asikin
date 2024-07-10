<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kalender_beasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_registrasi',
        'deadline',
        'judul',
        'deskripsi',
        'jurusan',
        'jenis_beasiswa',
        'keuntungan',
        'umur',
        'gpa',
        'tes_english',
        'tes_bahasa_lain',
        'tes_standard',
        'dokumen',
        'lainnya',
        'status_tampil'
    ];

    public function negara()
    {
        return $this->belongsToMany(Negara::class, 'knegaras', 'id_kbeasiswa', 'id_negara');
    }

    public function tingkat_studi()
    {
        return $this->belongsToMany(tingkat_studi::class, 'ktingkat_studis', 'id_kbeasiswa', 'id_tingkat_studi');
    }

    use SoftDeletes;
    protected $tables = 'kalender_beasiswas';
    protected $dates = ['deleted_at'];
    protected $softDeleteDays = 30; // Custom time limit for soft delete

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            if (! $model->forceDeleting) {
                $model->deleted_at = $model->freshTimestamp()->addDays($model->softDeleteDays);
                $model->save();
                return false;
            }
        });
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user', 'id');
    // }
}
