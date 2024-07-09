<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class knegara extends Model
{
    use HasFactory;
    protected $fillable = ['id_kbeasiswa', 'id_negara'];

    public function kalenderBeasiswa()
    {
        return $this->belongsTo(kalender_beasiswa::class, 'id_kbeasiswa', 'id');
    }

    public function negara()
    {
        return $this->belongsTo(Negara::class, 'id_negara', 'id');
    }
}
