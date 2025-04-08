<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAsesiModel extends Model
{
    protected $table = 'asesi_data';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    use HasFactory;


    protected $casts = [
        'id' => 'string',
    ];
}
