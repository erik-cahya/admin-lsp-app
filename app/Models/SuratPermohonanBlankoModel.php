<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPermohonanBlankoModel extends Model
{
    use HasFactory;
    protected $table = 'surat_permohonan_blanko';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk saat objek sedang dibuat
        static::creating(function ($model) {
            if (!$model->id) {
                // berikan nilai id : nilai acak 18 digit
                $model->id = rand(111111111111111111, 999999999999999999);;
            }
        });
    }

    // casts : berfungsi agar ketika data di ambil, id dibaca sebagai string
    protected $casts = [
        'id' => 'string',
    ];

    
    public function asesi()
    {
        return $this->hasMany(AsesiModel::class, 'id_surat_permohonan', 'id');
    }
}
