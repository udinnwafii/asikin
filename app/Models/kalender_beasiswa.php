<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kalender_beasiswa extends Model
{
    use HasFactory; // Enables usage of Eloquent's factory methods for this model

    use SoftDeletes; // Enables soft deletes for this model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tanggal_registrasi',
        'deadline',
        'judul',
        'deskripsi',
        'jurusan',
        'jenis_beasiswa',
        'keuntungan',
        'umur',
        'gpa',
        'tes_english',
        'tes_bahasa_lain',
        'tes_standard',
        'dokumen',
        'lainnya',
        'status_tampil'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kalender_beasiswas'; // Specifies the table name

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at']; // Specifies the column to use for soft deletes

    /**
     * Custom time limit for soft delete.
     *
     * @var int
     */
    protected $softDeleteDays = 30;

    /**
     * Boot function for the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        // Event listener for deleting event
        static::deleting(function ($model) {
            // Check if not force deleting (soft delete scenario)
            if (! $model->forceDeleting) {
                // Sets a custom deletion timestamp based on softDeleteDays
                $model->deleted_at = $model->freshTimestamp()->addDays($model->softDeleteDays);
                $model->save(); // Saves the model with the updated deletion timestamp
                return false; // Prevents the model from being actually deleted from the database
            }
        });
    }

    /**
     * Define the relationship with Negara (Country) model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function negara()
    {
        return $this->belongsToMany(Negara::class, 'knegaras', 'id_kbeasiswa', 'id_negara');
    }

    /**
     * Define the relationship with tingkat_studi (Study Level) model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tingkat_studi()
    {
        return $this->belongsToMany(tingkat_studi::class, 'ktingkat_studis', 'id_kbeasiswa', 'id_tingkat_studi');
    }

    // Uncomment and implement if needed: Establishes a belongsTo relationship with User model
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'id_user', 'id');
    // }
}