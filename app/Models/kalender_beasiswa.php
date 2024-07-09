<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user', 'id');
    // }
}
