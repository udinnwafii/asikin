<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class benua extends Model
{
    use HasFactory;
    protected $fillable = ['nama'];

    public function negara()
    {
        return $this->hasMany(negara::class, 'id_benua', 'id');
    }
}
