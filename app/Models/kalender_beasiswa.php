<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kalender_beasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['id_kategori', 'id_user', 'tanggal_registrasi', 'deadline', 
    'judul', 'deskrips', 'jurusan', 'jenis_beasiswa', 'keuntungan', 'umur', 'gpa', 'tes_english',
    'tes_bahasa_lain', 'tes_standard', 'dokumen', 'lainnya', 'status_tampil'];
}
