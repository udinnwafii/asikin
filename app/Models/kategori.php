<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $fillable = ['id_tingkat_studi', 'id_negara'];

    public function id_tingkat_studi(){
        $this->belongsTo(tingkat_studi::class, 'id_tingkat_studi', 'id');
    }

    public function id_negara(){
        $this->belongsTo(negara::class, 'id_negara', 'id');
    }
}
