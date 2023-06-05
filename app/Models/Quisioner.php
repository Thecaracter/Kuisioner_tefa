<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quisioner extends Model
{
    use HasFactory;
    protected $table = 'quisioner';

    protected $fillable = [
        'nama',
        'status'
    ];

    public $timestamps = true;
}