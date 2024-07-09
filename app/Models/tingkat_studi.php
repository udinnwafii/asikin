<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tingkat_studi extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama'];

    public function kalenderBeasiswa()
    {
        return $this->belongsToMany(kalender_beasiswa::class, 'kalender_beasiswa_tingkat_studi', 'tingkat_studi_id', 'kalender_beasiswa_id')->withTimestamps();
    }
}
