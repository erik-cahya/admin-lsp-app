<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class AsesiGroupModel extends Model
{
    protected $table = 'asesi_group';
    protected $fillable = ['id','nama_group_asesi'];
    protected $primaryKey = 'id';

    public $incrementing = false; // Matikan auto-increment
    protected $keyType = 'string'; // Tipe primary key adalah string


    use HasFactory;

    // casts : berfungsi agar ketika data di ambil, id dibaca sebagai string
    // protected $casts = [
    //     'id' => 'string',
    // ];

    protected static function boot()
    {
        parent::boot();

        // Set ID ke UUID saat data dibuat
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function asesi()
    {
        return $this->hasMany(AsesiDataModel::class, 'id_asesi_group', 'id');
    }
}
