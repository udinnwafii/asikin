<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ktingkat_studi extends Model
{
    use HasFactory;
    protected $fillable = ['id_kalender_beasiswa', 'id_tingkat_studi'];

    public function kalender_beasiwa()
    {
        return $this->belongsTo(kalender_beasiswa::class, 'id_kbeasiswa', 'id');
    }

    public function tingkat_studi()
    {
        return $this->belongsTo(tingkat_studi::class, 'id_tingkat_studi', 'id');
    }
}
