<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class negara extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'id_benua'];

    public function id_benua(){
        $this->belongsTo(benua::class, 'id_benua', 'id');
    }
}
