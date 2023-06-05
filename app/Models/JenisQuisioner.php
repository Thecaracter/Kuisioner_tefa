<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisQuisioner extends Model
{
    use HasFactory;
    protected $table = 'jenis_quisioner';

    protected $fillable = [
        'jenis',
    ];
}