<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class negara extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'id_benua'];

    public function benua()
    {
        return $this->belongsTo(benua::class, 'id_benua', 'id');
    }

    public function kategori()
    {
        return $this->hasMany(kategori::class, 'id_kategori', 'id');
    }
}
