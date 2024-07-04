<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kalender_beasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kategori',
        'id_user',
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

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}