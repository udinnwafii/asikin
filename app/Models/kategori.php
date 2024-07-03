<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $fillable = ['id_tingkat_studi', 'id_negara'];

    public function tingkat_studi()
    {
        return $this->belongsTo(tingkat_studi::class, 'id_tingkat_studi');
    }

    public function negara()
    {
        return $this->belongsTo(negara::class, 'id_negara');
    }
}
