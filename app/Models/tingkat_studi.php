<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tingkat_studi extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama'];

    public function kalender_beasiswa()
    {
        return $this->belongsToMany(kalender_beasiswa::class, 'ktingkat_studis', 'id_tingkat_studi', 'id_kbeasiswa');
    }
}
